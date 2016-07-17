function AltaUsuario(nombre,pass,twitter) {

$.ajax({url:"http://thebombgame.com.ar:1880/Alta-Usuario",
	data: {"parametro1" : nombre, "parametro2" : pass, "parametro3":twitter},
     	type: "GET",
	dataType: 'jsonp', // Notice! JSONP <-- P (lowercase)
     success:function(data){
        alert("El Alta Fue Exitosa.Tu Nro de Jugador Es: "+data.insertId); 
	document.getElementById("txt_Nombre").value="";
	document.getElementById("txt_Pass").value="";
	document.getElementById("txt_Mail").value="";
	document.getElementById("txt_Twitter").value="";
	},
     error:function(){
	alert("Error"); 

     }      
});
}

