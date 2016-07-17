function cargarTablaPuntaje() {

$.ajax({url:"http://93.188.166.173:1880/Tabla-De-Posiciones",
     dataType: 'jsonp', // Notice! JSONP <-- P (lowercase)
     success:function(json){
         // do stuff with json (in this case an array)
         for (var x = 0 ; x< json.length ;x++){
$("#Tabla tbody").append('<tr><td>'+json[x].NOMBRE_USUARIO+'</td><td><a href="https://twitter.com/'+json[x].TWITTER.replace("@","")+'">'+json[x].TWITTER+'</a></td><td>'+json[x].PUNTAJE+'</td></tr>');}



     },
     error:function(){
         alert("Error");
     }      
});
}
cargarTablaPuntaje() ;
