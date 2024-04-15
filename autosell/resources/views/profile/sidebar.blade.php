<link rel="stylesheet" href="{{ asset('css/sidebar.css')}}">

<aside class="sidebar">
    <div class="toggle p-3">
      <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
      <span></span>
      </a>
    </div>
    <div class="side-inner">
      <div class="profile">
        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image" class="img-fluid">
        <h3 class="name">Debby Williams</h3>
        <span class="country">New York, USA</span>
      </div>
    <div class="counter d-flex justify-content-center">
    
      <div class="col">
        <strong class="number">892</strong>
        <span class="number-label">Posts</span>
      </div>
      <div class="col">
        <strong class="number">22.5k</strong>
        <span class="number-label">Followers</span>
      </div>
      <div class="col">
        <strong class="number">150</strong>
        <span class="number-label">Following</span>
      </div>
    
    </div>
    <div class="nav-menu">
      <ul>
        {{-- profile --}}
        @if ($active_link == 'profile')
          <li class="active"><a href="{{ route('profile.index')}}"><i class="fa-solid fa-info"></i> Profile</a></li>        
        @else
          <li><a href="{{ route('profile.index')}}"><i class="fa-solid fa-info"></i> Profile</a></li>
        @endif
        {{-- dashboard  --}}
        @if ($active_link == 'dashboard')
          <li class="active"><a href="{{ route('dashboard.show')}}"><i class="fa-solid fa-table-columns"></i> Dashboard</a></li>        
        @else
          <li><a href="{{ route('dashboard.show')}}"><i class="fa-solid fa-table-columns"></i> Dashboard</a></li>
        @endif
        {{-- notifications --}}
        @if ($active_link == 'notifications')
          <li class="active"><a href="#"><i class="fa-regular fa-envelope"></i></span> Notifications</a></li>        
        @else
          <li><a href="#"><i class="fa-regular fa-envelope"></i></span> Notifications</a></li>
        @endif
        
        @if ($active_link == 'adform')
          <li class="active"><a href="{{ route('ad.form.show')}}"><i class="fa-brands fa-adversal"></i> Make an advertisement</a></li>        
        @else
          <li><a href="{{ route('ad.form.show')}}"><i class="fa-brands fa-adversal"></i> Make an advertisement</a></li>
        @endif
        
        @if ($active_link == 'settings')
          <li class="active"><a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>        
        @else
          <li><a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
        @endif

        <form id="logout" action="{{route('logout')}}" method="POST">
            @csrf
            <li><a href="javascript:{}" onclick="document.getElementById('logout').submit(); return false;"><i class="fa-solid fa-right-from-bracket"></i> Sign out</a></li></form>
      </ul>
    </div>
    </div>
    </aside>

    <script>
      $(function() {
    
      'use strict';
    
      $('.js-menu-toggle').click(function(e) {
    
        var $this = $(this);
    
        
    
        if ( $('body').hasClass('show-sidebar') ) {
          $('body').removeClass('show-sidebar');
          $this.removeClass('active');
        } else {
          $('body').addClass('show-sidebar');	
          $this.addClass('active');
        }
    
        e.preventDefault();
    
      });
    
      // click outisde offcanvas
      $(document).mouseup(function(e) {
        var container = $(".sidebar");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          if ( $('body').hasClass('show-sidebar') ) {
            $('body').removeClass('show-sidebar');
            $('body').find('.js-menu-toggle').removeClass('active');
          }
        }
      }); 
    
      
    
    });
    </script>