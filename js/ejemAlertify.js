/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
    $('.run').click(function(event){
        var alert = alertify.alert('Alerta en espanol!');
        alert.set('label','ok');
        alert.show();
    });
});

$(function(){
   $('.run2').click(function(event){
       var alert = alertify.alert('This is an alert!');
       alert.set('label','Got it');
       alert.show();
   }) 
});

$(function(){
   $('.run3').click(function(event){
       var alert = alertify.alert('Desea confirmar la venta');
       alert.set('label','Got it');
       alert.set('onok',function(){
          alertify.success('You clicked OK.'); 
       });
       alert.show();
   });
});