<aside class="sidebar">
    <div class="toggle">
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
        <li class="active"><a href="#"><i class="fa-solid fa-info"></i> Info</a></li>
        <li><a href="#"><i class="fa-solid fa-table-columns"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa-regular fa-envelope"></i></span> Notifications</a></li>
        <li><a href="#"><i class="fa-brands fa-adversal"></i> Make an advertisement</a></li>
        <li><a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
        <form id="logout" action="{{route('logout')}}" method="POST">
            @csrf
            <li><a href="javascript:{}" onclick="document.getElementById('logout').submit(); return false;"><i class="fa-solid fa-right-from-bracket"></i> Sign out</a></li></form>
      </ul>
    </div>
    </div>
    </aside>