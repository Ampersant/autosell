<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-signin-client_id" content="476007921764-hs9c7a8qm3ikojs0apq7krk7sf75c77b.apps.googleusercontent.com">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{ asset('css/login-register.css')}}" rel="stylesheet" />
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="{{ asset('js/login-register.js')}}" type="text/javascript"></script>

    <title>Login form</title>
</head>
<body>
    <div class="content registerBox" >
        <div class="container" style="width: 60vh;"><div class="form">
                @if ($errors->any())
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
             @endif
           <form method="post" html="{:multipart=>true}" data-remote="true" action="{{ route('login') }}" accept-charset="UTF-8">
           @csrf
            <input id="email" class="form-control mt-3" type="text" placeholder="Email" name="email">
           <input id="password" class="form-control mt-3" type="password" placeholder="Password" name="password"> 
           <input class="btn btn-default btn-register mt-3" type="submit" value="Login" name="commit">
           </form>
           </div>
           <div class="g-signin2" data-onsuccess="onSignIn"></div>
       </div>
    </div>
<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    }
</script>
</body>
</html>