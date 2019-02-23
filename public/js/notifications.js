
$(document).ready(function(){

  loadNotifications()

});

function test(element,e){
  var notificationItemist = element.parentElement;
  notificationItemist.parentElement.removeChild(notificationItemist);
  e.stopPropagation(); //esto es para que no se cierre el menu al hacer click
  markNotificationAsSeen(element.dataset.notifid);
  $('#newNotificationsCounter').text($('#newNotificationsCounter').text()-1);
  return false;
}

 function markNotificationAsSeen(id){
   $.ajax({

     url: '/notificaciones/leer/'+id,
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token-notifications"]').attr('content')
     },
      type: 'PUT',
     success: function(respuesta) {
     console.log(respuesta)
     },

     error: function() {

         console.log("No se ha podido obtener la información");

     }

 });
 }

function loadNotifications(){
  $.ajax({

    url: '/notificaciones/api',

    success: function(respuesta) {

      var notifications = JSON.parse(respuesta)


        $('#notificationList').empty();
      if(notifications.length)
      {
           $('#newNotificationsCounter').text(notifications.length);
           $('#newNotificationsCounter').css('display', 'inline-block');

           notifications.forEach(function(notification) {
             var nuevaNotificacion = "<li> <a data-notifid="+notification.id+" onclick='return test(this,event)'><i class='fa fa-trash text-red'></i>"+notification.description+"</a> </li>";
             $('#notificationList').append(nuevaNotificacion);
           });

      }
      else {
         var nuevaNotificacion = "<li><a>"+notification.description+"</a></li>";
         $('#notificationList').append(nuevaNotificacion);
      }


    },

    error: function() {

        console.log("No se ha podido obtener la información");

    }

});
}
