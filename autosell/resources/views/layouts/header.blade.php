<nav class="navbar navbar-expand-sm navbar-secondary bg-light" style="box-shadow: 0 4px 8px -2px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)">Autosell</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about.show')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('blog.show')}}">Blog</a>
          </li>
        </ul>
        {{-- <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Search">
          <button class="btn btn-primary" type="button">Search</button>

        </form> --}}
        <div class="d-flex ms-auto order-5">
                    
            @auth
            <a class="btn btn-light m-2" href="{{ route('profile.index')}}">Profile</a>
            @endauth
            
            @guest
                <a class="btn btn-light m-2" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a>
                <a class="btn btn-light m-2" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Register</a>    
            @endguest

        </div>
      </div>
    </div>
  </nav>
@include('auth.login_register_modal')
