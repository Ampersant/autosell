<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body style="background-color: #F9FBFC">
    @include('layouts.header')
<div>
 
    <div class="container">
        <div class="row">
          @include('layouts.nav')

              <div class="col" >
              @foreach ($data['autos'] as $item)
              
              <div class="row featurette m-5 p-3" style="box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.1);">
                <div class="col-md-7 order-md-2">
                  <a class="featurette-heading fw-normal lh-1" href="{{route('singleitem.show', ['id' => $item->id])}}"><h2 class="featurette-heading fw-normal lh-1">{{ $item->mark->name }} <span class="text-body-secondary">{{ $item->markmodel->name }}</span></h2></a>
                  <p class="lead">{{ $item->description }}</p>
                </div>
                <?php ?>
                  {{-- @dd(base64_encode($item->image[0]->encode())) --}}
                  <div class="col-md-5 order-md-1">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500"  role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                      <title>{{$item->mark->name}}</title>
                      <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect>
                      <image xlink:href="{{asset($item->image[0]->p_path)}}" width="100%" height="100%" />
                      <!-- Вместо "url_вашего_изображения" укажите путь к вашему изображению -->
                      <text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text>
                    </svg>
                  </div>
                  
                


              </div>
              @endforeach

            
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>


