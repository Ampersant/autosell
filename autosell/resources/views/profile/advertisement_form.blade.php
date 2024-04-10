<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/nice-form.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>
    @include('profile.sidebar')
    <div class="container">
        <div class="nice-form-group">
            <label>Text</label>
            <input type="text" placeholder="Your name" value="" />
          </div>
          
          <div class="nice-form-group">
            <label>Email</label>
            <input type="email" placeholder="Your email" value="" />
          </div>
          
          <div class="nice-form-group">
            <label>Phonenumber</label>
            <input type="tel" placeholder="Your phonenumber" value="" />
          </div>
          
          <div class="nice-form-group">
            <label>Url</label>
            <input type="url" placeholder="www.google.com" value="" />
          </div>
          
          <div class="nice-form-group">
            <label>Password</label>
            <input type="password" placeholder="Your password" />
          </div>
          
          <div class="nice-form-group">
            <label>Search</label>
            <input type="search" placeholder="Search all the things" value="" />
          </div>
          
          <div class="nice-form-group">
            <label>Disabled field</label>
            <input type="text" disabled placeholder="Your name" value="" />
          </div>
        </div>
</body>
</html>