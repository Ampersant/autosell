<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-form.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/adform/getmodel.js') }}"></script>
    
    <title>Document</title>
</head>
<body style="background-color: #F9FBFC">
  @include('layouts.loader')  
  @include('layouts.header')
<div>
    <div id="content-main" class="container">
        <div class="row">
          @include('layouts.nav')
              <div id="item" class="col" >
              @foreach ($data['autos'] as $item)
              <div class="row featurette m-5 p-3" style="box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.1);">
                <div class="col-md-7 order-md-2">
                  <a class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" href="{{route('singleitem.show', ['id' => $item->id])}}"><h2 class="featurette-heading fw-normal lh-1">{{ $item->mark->name }} <span class="text-body-secondary">{{ $item->markmodel->name }}</span></h2></a>
                  <p class="lead" style="overflow: hidden; text-overflow: ellipsis;">{{ $item->description }}</p>
                </div>
                  <div class="col-md-5 order-md-1">
                    <img src="{{ asset($item->image[0]->thumb_path) }}" alt="{{ $item->mark->name }}" class="img-fluid mx-auto d-block" style="width: 300px; height: 300px; object-fit: contain;">
                  </div>
              </div>
              @endforeach
        </div>
    </div>
</div>
@include('layouts.footer')
<script>
  $(document).ready(function() {
    $('a').click(function(event) {
      event.preventDefault(); // Prevent the default link behavior

      // Animate the fade out
      $('#content').addClass('fade-out');

      // Wait for the animation to complete before following the link
      let url = $(this).attr('href');
      setTimeout(function() {
        window.location.href = url;
      }, 1000); // Duration of the fade out animation in milliseconds
    });
  });
</script>
</body>
</html>


