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
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    @include('layouts.header')
<div>
    <div class="container">
        <div class="row">
            <div class="col-3 m-5 " style="box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.1);">

              Sidebar
                <p>adasdasd</p>
                <ul>asdasd</ul>
            </div>
            <div class="col" >
              @foreach ($data['autos'] as $item)
              <div class="row featurette m-5 p-3" style="box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.1);">
                <div class="col-md-7 order-md-2">
                  <h2 class="featurette-heading fw-normal lh-1">{{ $item->mark->name }} <span class="text-body-secondary">{{ $item->markmodel->name }}</span></h2>
                  <p class="lead">{{ $item->description }}</p>
                </div>
                <div class="col-md-5 order-md-1">
                  <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
                </div>
            </div>
              @endforeach

            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>


