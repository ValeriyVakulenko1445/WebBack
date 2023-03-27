setInterval(()=>{
const tiempo = document.querySelector(".temp");
let date = new Date();
let hora = date.getHours();
let minutes = date.getMinutes();
let seconds = date.getSeconds();
let dia_noche = "AM";
if(hora > 12){
   dia_noche = "PM";
   hora = hora -12;
}
if(seconds <10){
   seconds = "0" +seconds;
}
if(minutes <10){
   minutes = "0" +minutes;
}
if(hora < 10){
   hora = "0"+hora;
}
tiempo.textContent = hora +":"+ minutes +":"+seconds +" "+ dia_noche;
},1000);