<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/layouts/errors/404.css') }}">
    {{-- <script src="{{ asset('js/layouts/errors/404.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
@include('layouts.header')
 <!-- end about -->

 
     <section class="wrapper" style="overflow: hidden">
 
         <div class="container">
 
             <div id="scene" class="scene" data-hover-only="false">
 
 
                 <div class="circle" data-depth="1.2"></div>
 
                 <div class="one" data-depth="0.9">
                     <div class="content">
                         <span class="piece"></span>
                         <span class="piece"></span>
                         <span class="piece"></span>
                     </div>
                 </div>
 
                 <div class="two" data-depth="0.60">
                     <div class="content">
                         <span class="piece"></span>
                         <span class="piece"></span>
                         <span class="piece"></span>
                     </div>
                 </div>
 
                 <div class="three" data-depth="0.40">
                     <div class="content">
                         <span class="piece"></span>
                         <span class="piece"></span>
                         <span class="piece"></span>
                     </div>
                 </div>
 
                 <p class="p404" data-depth="0.50">404</p>
                 <p class="p404" data-depth="0.10">404</p>
 
             </div>
 
             <div class="text">
                 <article>
                     <p>Uh oh! Looks like you got lost. <br>Go back to the homepage if you dare!</p>
                     <button>i dare!</button>
                 </article>
             </div>
 
         </div>
     </section>
     <script>
        var scene = document.getElementById('scene');
        var parallax = new Parallax(scene);
    </script>
</body>
</html>