<li class="dropdown notifications-menu">
    <meta name="csrf-token-notifications" content="{{ csrf_token() }}">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-bell-o"></i>
    <span id="newNotificationsCounter" style="display:none" class="label label-danger">0</span>
  </a>
  <ul class="dropdown-menu">
    <li class="header">Notificaciones:</li>
    <li>
      <!-- inner menu: contains the actual data -->
      <ul class="menu" id="notificationList">
        {{-- <li>
          <a href="#">
            <i class="fa fa-exclamation text-aqua"></i> Ninguna!
          </a>
        </li> --}}
      </ul>
    </li>
    <li class="footer"><a href="/notificaciones">Ver todas</a></li>
  </ul>
</li>


<script src="{{ asset('js/notifications.js') }}" language="JavaScript" type="text/javascript"></script>
