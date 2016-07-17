net = require('net');
var _ = require("underscore");
var clientes_conectados = [];
var clientes_esp_partida =[];
var partidas_en_curso=[];
var publicaciones = [];
net.createServer(function (socket) {

	// crea el nombre del socket abierto
  socket.name = socket.remoteAddress + ":" + socket.remotePort 

  //se agrega el cliente conectado al listado
  clientes_conectados.push(socket);

  //Se le informa la conexion OK
  socket.write("OK\n");

// en el caso de recibir informacion se ejecuta  
socket.on('data', function (data) {
		console.log("data: "+data);
		var data2 = ""+data;
		console.log("data2: "+data2);
		switch (data2.substr(0,1)){
		case "E":
			if ( clientes_esp_partida.length ==0){
				clientes_esp_partida.push(socket);
			}
			else{
				var c_para_unir = clientes_esp_partida.pop();
				console.log(socket.name +"Se Unio con: "+c_para_unir.name);
				partidas_en_curso.push([socket,c_para_unir]);
				socket.write("I");
				c_para_unir.write("I");
			}
		break;
		case "G":
		partida_aux = buscarPartida(socket);
		 
		if (partida_aux.length >0){
				var contrincante =buscarContrincante(partida_aux,socket);
	 	
				contrincante.write("P");
				publicaciones.push("G"+socket.alias+"A"+contrincante.alias);
				eliminarPartida(partida_aux);
		}
		break; 
		case "N":
		socket.alias= data2.substr(1,data2.length);
		
		break; 

		case "A":
		console.log(socket.alias);
		
		break; 
		default:
			partida_aux = buscarPartida(socket);
			if (partida_aux.length >0){
				var contrincante =buscarContrincante(partida_aux,socket);
				contrincante.write(data);
			}
			else{
				console.log("El jugador no existe en ninguna partida");
			}
		break;
		}
		
});
function buscarContrincante(partida,jugador){
					var jug1 = _.first(partida);
					var jug2=  _.last(partida);
					
					if (jug1 === socket) {return jug2;}
					if (jug2 === socket) {return jug1;}	
}
function buscarPartida (unJugador){
					var salida=[];
					partidas_en_curso.forEach(function (partida) {
					var jug1 = _.first(partida);
					var jug2=  _.last(partida);
					
					if (jug1 === unJugador || jug2 === unJugador) {salida= partida;}
					});	
					return salida;
}
function eliminarPartida(partida_aux){
		partidas_en_curso.splice(partidas_en_curso.indexOf(partida_aux), 1);
}
  socket.on('end', function () {
    partida_aux = buscarPartida(socket);
	if (partida_aux.length >0){
	var contrincante =buscarContrincante(partida_aux,socket);
	contrincante.write("C");
	eliminarPartida(partida_aux);
	}				
	clientes_conectados.splice(clientes_conectados.indexOf(socket), 1);
   });
}).listen(4000);

net.createServer(function (socket) {

  socket.write("OK\n");
  socket.on('data', function (data) {
	publicaciones.push(data);
	});
  socket.on('end', function () {});
  

}).listen(8080);
net.createServer(function (socket) {

	
  socket.on('data', function (data) {	
if (publicaciones.length>0){
	socket.write(publicaciones.pop()+"\n");
	}  
  //console.log("Recibi: "+data);
  //socket.write(data+"\n");
});


  // Remove the client from the list when it leaves
  socket.on('end', function () {});
   
  // Send a message to all clients

}).listen(8081);

