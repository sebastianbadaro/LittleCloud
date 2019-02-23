
$(document).ready(function(){
  console.log('hola soy el js de notificacion me cargue bien');

  $.ajax({

    url: '/notificaciones/api',

    success: function(respuesta) {

      var notifications = JSON.parse(respuesta)

      if(notifications.length);
      {
          $('#newNotificationsCounter').text(notifications.length);
          $('#newNotificationsCounter').css('display', 'inline-block');

      }

      notifications.forEach(function(notification) {
        var nuevaNotificacion = "<li><a>"+notification.description+"</a></li>";
        $('#notificationList').append(nuevaNotificacion);
      });
    },

    error: function() {

        console.log("No se ha podido obtener la información");

    }

});
});
