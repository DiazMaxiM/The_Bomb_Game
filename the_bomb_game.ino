#include <SPI.h>
#include <LiquidCrystal.h>
#include <WiFiEsp.h>
#include <TimerOne.h> // Libreria Para Manejar Interrupciones
#include <LiquidCrystal.h>
#ifndef HAVE_HW1
#include <SoftwareSerial.h>
SoftwareSerial Serial1(8, 9); // RX, TX
#endif
LiquidCrystal lcd(10); // Configuracion LCD
#include <Keypad.h>
byte ultima_tecla_apretada;
const byte ROWS = 4; //four rows
const byte COLS = 3; //three columns
const char keys[ROWS][COLS] = {
  {'1','2','3'},
  {'4','5','6'},
  {'7','8','9'},
  {'*','0','#'}
};
byte rowPins[ROWS] = {12, 7, 6, 5}; //connect to the row pinouts of the keypad
byte colPins[COLS] = {4, 3, 2}; //connect to the column pinouts of the keypad

Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );

int tiempoTranscurrido = 0; //Contador de Tiempo De La Partida, Se Utiliza para poder calcular el puntaje del juego

WiFiEspClient conexionTCP;

void setup() {
byte heart[8] = {B00000, B01010, B11111, B11111, B11111, B01110, B00100, B00000}; //Array para dibujar Corazon

byte bomb[8] =  {B00100, B00010, B00100, B01110, B11011, B10111, B11011, B01110}; //Array para dibujar Bomba1

byte bomb2[8] = {B00010, B00100, B00100, B01110, B11011, B10111, B11011, B01110}; //Array para dibujar Bomba2

  // Cargo los graficos en el lcd
  lcd.createChar(4, heart);
  lcd.createChar(1, bomb);
  lcd.createChar(2, bomb2);

  Serial.begin(9600); //Inicializo Comunicacion Serial (0,1) RX | TX
  Serial1.begin(9600);
  WiFi.init(&Serial1);

  lcd.begin(16, 2);   // Configuro el LCD en dos Lineas Con 16 Caracteres

  pinMode(A0, INPUT); //Configuro la entrada Analogica A0 , esta se utiliza Para Leer un valor aleatorio de la antena y posteriormente generar numero aleatorio
  randomSeed(leerSemillaAleatoria()); // Configuro Semilla Aleatoria
}

void loop() {

  iniciarPantallaBienvenida(); // Pantalla De Bienvenida Con el Dibujo de las Bombas

  switch (cargarMenuPantallaInicial()) {
    case 0:
      menuJuego();
      break;
    case 1:
      menuConfiguracion();
      break;
  }
}

byte cargarMenuPantallaInicial() {
  String textoMenu[4] = {"Iniciar Juego", "Configuracion", "Volver",""};
  return (cargarMenuPantalla(textoMenu,3));
}
void menuJuego() {

  String textoMenu[4] = {"Local", "En Red","Volver",""};
  switch (cargarMenuPantalla(textoMenu,3)) {
    case 0:
      iniciarJuego(false);
      break;
    case 1:
      iniciarJuegoRed();
      break;
  }

}
bool hayContrincante(){
  bool result = false;
  if (conexionTCP.available())
  {
    if (conexionTCP.read()== 'I')
    {
    result = true;
    }
  }
  return (result);
}
void iniciarJuegoRed(){
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Conectando");
  lcd.setCursor(0,1);
  lcd.print("Al Servidor");
  conexionTCP.stop();
  byte codigoUsuario[4];
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("* * * *");
  lcd.setCursor(0,1);
  lcd.print("Codigo Jugador");
  leerCodigoIngresado(codigoUsuario);
  if (conexionTCP.connect("93.188.166.173", 4000)) {
    lcd.clear();
    conexionTCP.print("N"+String(codigoUsuario[0])+String(codigoUsuario[1])+String(codigoUsuario[2])+String(codigoUsuario[3]));
    lcd.print(conexionTCP.read());
    conexionTCP.print("E");
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.println("Esperando");
    lcd.setCursor(0,1);
    lcd.println("Contrincante....");
    while (noApretoTecla() && !hayContrincante()) {}
    iniciarJuego(true);
    delay(10000);
    Serial.print("1");
  }
}
void menuConfiguracion() {

  String textoMenu[3] = {"Buscar Redes", "IP",""};
  switch (cargarMenuPantalla(textoMenu,2)) {

    // buscar redes
    case 0:
      buscarRedesWifi();
      break;

    // ip
    case 1:
      mostrarMiIP();
      break;
  }

}

void mostrarMiIP() {

 IPAddress ip = WiFi.localIP();
 lcd.clear();
 lcd.print("IP:");
 lcd.setCursor(0,1);
 lcd.print(ip);
 delay(5000); 
}

void buscarRedesWifi() {

  lcd.clear();
  lcd.print("Buscando Redes");
  lcd.setCursor(0, 1);
  byte cantRedesEncontradas = WiFi.scanNetworks();
  lcd.print("Enc: " + String (cantRedesEncontradas));
  delay(2000);
  lcd.clear();
  bool entro = false;
  byte pos = 0;
  while (!entro) {
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print(">");
    lcd.print(WiFi.SSID(pos));
    lcd.setCursor(1, 1);
    if (pos != (cantRedesEncontradas -1) ){
    lcd.print(WiFi.SSID(pos + 1));}else{
    lcd.print("                ");}

    while (noApretoTecla()) {}
    switch (leerTeclaApretada())
    {
      case 2:
        pos--;
      case 8:
      if (pos !=(cantRedesEncontradas-1)){
        pos++;}
        break;
      case 5:
        entro = true;
        break;
    }
  }
  int status = WL_IDLE_STATUS;     // the Wifi radio's status
  byte intentos = 0;
  lcd.clear();
  lcd.print("Contectando");  
  lcd.setCursor(0,1);
  lcd.print(WiFi.SSID(pos));
  while ( status != WL_CONNECTED && intentos< 5) {
    intentos++;
 lcd.print(".");  
    status = WiFi.begin(WiFi.SSID(pos),"");
  }
  if (status != WL_CONNECTED){
    lcd.clear();
    lcd.print("Problemas Conex.");
    delay(10000);
  }
}

void iniciarPantallaBienvenida() {
  pantallaBienvenida();
  while (noApretoTecla()) {
    actualizarBombaPantalla();
  }
  leerTeclaApretada();
}

void incrementar_tiempo() {
  tiempoTranscurrido++;
}

void iniciarJuego(bool red) {
    byte codigoUsuario[4];
    if (!red){
    lcd.clear();
    lcd.print("* * * *");
    lcd.setCursor(0,1);
    lcd.print("Codigo Jugador");
    leerCodigoIngresado(codigoUsuario);
    }
   lcd.clear();
   Timer1.initialize(1000000);         // initialize timer1, and set a 1/2 second period
   Timer1.attachInterrupt(incrementar_tiempo);  // attaches callback() as a timer overflow interrup
  byte numeroSecreto[4];
  generarNumeroSecreto(numeroSecreto);
 byte vidasEnElJuego = 30;
  bool gano = false;

  while (vidasEnElJuego > 0 && not gano) {

    Serial.print("CantidadDeVidas:");
    Serial.println(vidasEnElJuego);
    byte codigoIngresado[4] ;
    lcd.setCursor(0, 0);
    lcd.print("                ");
    lcd.setCursor(0, 0);
    lcd.print("* * * * ");
    lcd.write(byte(4));
    lcd.print(":");
    lcd.print(vidasEnElJuego);
    leerCodigoIngresado(codigoIngresado);

    if (red){
      if (conexionTCP.available())
      {
        char caracter = conexionTCP.read();
        if (caracter=='P'){
        vidasEnElJuego=0;
        lcd.clear();
        lcd.print("PERDISTE");
        delay(5000);
        continue; 
        }
        if (caracter=='C'){
        gano=true;
        lcd.clear();
        lcd.println("JUGADOR DESC.");
        delay(5000);
        continue; 
        }
    }
    }
    
    if (compararNumeros(numeroSecreto, codigoIngresado)) {
      gano = true;
      if (red){
        conexionTCP.print("G");
      }
    }
    else
    {
      if (!red)
      {vidasEnElJuego--;}
      lcd.setCursor(0, 1);
      lcd.print("                ");
      lcd.setCursor(0, 1);
      lcd.print("NPC: ");
      lcd.print(numeroEnPosicionCorrecta(numeroSecreto, codigoIngresado));
      lcd.print("NC: ");
      lcd.print(numerosCorrectos(numeroSecreto, codigoIngresado));
    }
  }

  Timer1.stop();
  if (gano) {
    int puntaje = ((900 - tiempoTranscurrido ) * vidasEnElJuego );
    Serial.println("Gano");
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("     BOMBA     ");
    lcd.setCursor(0, 1);
    lcd.print("  DESACTIVADA  ");
    delay(5000);
    lcd.clear();
    lcd.print ("Puntaje: "+String(puntaje));
    if (!red){
        if (conexionTCP.connect("93.188.166.173", 8080)) {
        conexionTCP.print("N"+String(codigoUsuario[0])+String(codigoUsuario[1])+String(codigoUsuario[2])+String(codigoUsuario[3])+"P"+String(puntaje));
        lcd.clear();
        lcd.print("Puntaje Pub.");
        lcd.setCursor(0,1);
        lcd.print ("Puntaje: "+String(puntaje));
        conexionTCP.stop();
        }
    }
    delay(5000);
  }
  else
  {
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("     BOOM     ");
    delay(10000);
  }
}



void pantallaBienvenida() {
  lcd.clear();
  lcd.setCursor(3, 0);
  lcd.write(byte(1));
  lcd.print(" BOMB ");
  lcd.write(byte(2));
  lcd.setCursor(2, 1);
  lcd.print("Press  Start");
}


void actualizarBombaPantalla() {
  lcd.setCursor(3, 0);
  lcd.write(byte(2));
  lcd.setCursor(10, 0);
  lcd.write(byte(1));
  delay(500);
  lcd.setCursor(3, 0);
  lcd.write(byte(1));
  lcd.setCursor(10, 0);
  lcd.write(byte(2));
  delay(500);
}


byte leerTeclaApretada() {
  byte number = ultima_tecla_apretada - 48;
  return number;
  }

// retorna TRUE cuando no hay ninguna tecla para leer en serial
bool noApretoTecla() {
   ultima_tecla_apretada = keypad.getKey();
   //Serial.write(ultima_tecla_apretada);
   return (ultima_tecla_apretada == NO_KEY);
}


int leerSemillaAleatoria() {
  return (analogRead(A0));
}


// rellena el array con 4 numeros random, todos distintos
void generarNumeroSecreto(byte numeroSecreto[4]) {

  numeroSecreto[0] = random(0, 9);

  for (byte i = 1; i < 4; i++) {

    byte posible = random(0, 9);

    while ( esIgualAAlguno(posible, numeroSecreto, i) ) {
      posible = random(0, 9);
    }

    numeroSecreto[i] = posible;
  }

  Serial.print(numeroSecreto[0]);
  Serial.print(numeroSecreto[1]);
  Serial.print(numeroSecreto[2]);
  Serial.println(numeroSecreto[3]);
  ////Serial.println("Numero Generado");

}

// comprueba que el numero actual sea distinto a los anteriores generados
bool esIgualAAlguno(byte posible, byte numeroSecreto[4], byte i) {

  bool resultado = false;
  for (byte x = 0; x < i; x++) {
    if (numeroSecreto[x] == posible) {
      resultado = true;
    }
  }
  return resultado;
}


byte cargarMenuPantalla(String* textoMenu,byte posicionesPosible) {
  bool entro = false;
  byte posicionCursor = 0;
  while (not entro) {
    mostrarMenuEnPantalla(textoMenu, posicionCursor);
    while (noApretoTecla()) {}
    switch (leerTeclaApretada())
    {
      case 2:
        if (posicionCursor>0){posicionCursor--;}
        mostrarMenuEnPantalla(textoMenu, posicionCursor);
        break;

      case 8:
        if (posicionesPosible> (posicionCursor+1) ){posicionCursor++;}
        mostrarMenuEnPantalla(textoMenu, posicionCursor);
        break;

      case 5:
        entro = true;
        break;
    }
  }
  return posicionCursor;
}
void mostrarMenuEnPantalla(String* menu, byte desde) {
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print(">");
  lcd.print(menu[desde]);
  lcd.setCursor(0, 1);
  lcd.print(" ");
  lcd.print(menu[(desde + 1)]);
}


// lee 4 veces el ingreso de datos, uno por cada digito
void leerCodigoIngresado(byte codigoIngresado[4]) {
  byte teclasApretadas = 0;
  while (teclasApretadas < 4) {

    while (noApretoTecla()) {}
    codigoIngresado[teclasApretadas] = leerTeclaApretada();
    mostrarEnPantallaTeclaApretada(codigoIngresado[teclasApretadas], teclasApretadas);
    teclasApretadas++;
  }
}

void mostrarEnPantallaTeclaApretada(byte numero, byte posicion) {
  lcd.setCursor(posicion * 2, 0);
  lcd.print((String)numero);
}


// comprueba si el numero ingresado es el numero secreto
bool compararNumeros(byte numeroSecreto[4], byte numeroIngresado[4]) {

  return ( numeroSecreto[0] == numeroIngresado[0]
           && numeroSecreto[1] == numeroIngresado[1]
           && numeroSecreto[2] == numeroIngresado[2]
           && numeroSecreto[3] == numeroIngresado[3] );
}


// comprueba cuantos numeros estan en su posicion correcta
byte numeroEnPosicionCorrecta(byte numeroSecreto[4], byte numeroIngresado[4]) {

  byte cantidadDeNumeros = 0;

  for (byte x = 0 ; x < 4; x++) {
    if (numeroSecreto[x] == numeroIngresado[x]) {
      cantidadDeNumeros++;
    }
  }

  return (cantidadDeNumeros);
}


// comprueba cuantos de los numeros ingresados forman parte del numero secreto
byte numerosCorrectos(byte numeroSecreto[4], byte numeroIngresado[4]) {

  byte cantidadDeNumeros = 0;

  for (byte x = 0 ; x < 4; x++) {
    for (byte y = 0 ; y < 4 ; y++) {
      if (numeroIngresado[x] == numeroSecreto[y]) {
        cantidadDeNumeros++;
      }
    }
  }
  return (cantidadDeNumeros);
}


