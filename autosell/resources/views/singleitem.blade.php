<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Document</title>

</head>
<body>
  @include('layouts.loader')
  @include('layouts.header')
    <div id="content" class="container mt-5 mb-5">
      <div class="row d-flex justify-content-center">
          <div class="col-md-10">
              <div class="card">
                  <div class="row">
                      <div class="col-md-6">
                          {{-- <div class="images p-3"> --}}
                            <div id="carouselExampleIndicators" class="carousel slide m-2">
                              <div class="carousel-indicators">
                                @for($i = 0; $i < count($item->image); $i++)
                                  @if ($i == 0)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide {{$i+1}}"></button> 
                                  @else
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" aria-label="Slide {{$i+1}}"></button>    
                                  @endif
                                @endfor
                              </div>
                              <div class="carousel-inner">
                                
                                @foreach ($item->image as $key => $image)
                                @if ($key == 0)
                                      <div class="carousel-item active">
                                        <img src="{{asset($image->carousel_path)}}" class="d-block w-100" style="object-fit: contain; max-width: 1024px; max-height: 700px;" alt="...">
                                      </div>
                                    @else
                                      <div class="carousel-item">
                                        <img src="{{asset($image->carousel_path)}}" class="d-block w-100" style="object-fit: contain; max-width: 1024px; max-height: 700px;"  alt="...">
                                      </div>
                                    @endif

                                @endforeach
                                
                              </div>
                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                              </button>
                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                              </button>
                            </div>

                              {{-- <div class="text-center p-4"> <img id="main-image" src="{{asset($item->image->first()->p_path)}}" width="250" /> </div>
                              <div class="thumbnail text-center"> <img onclick="change_image(this)" src="https://i.imgur.com/Rx7uKd0.jpg" width="70"> <img onclick="change_image(this)" src="https://i.imgur.com/Dhebu4F.jpg" width="70"> </div> --}}
                          {{-- </div> --}}
                      </div>
                      <div class="col-md-6">
                          <div class="product p-4">
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="d-flex align-items-center"><a href="{{route('index')}}"><i class="fa fa-long-arrow-left"></i> <span class="ml-3">Back</span></a></div>
                              </div>
                              <div class="mt-2 mb-3"> <span class="text-uppercase text-muted brand">{{$item->mark->name}}</span>
                                  <h5 class="text-uppercase">{{$item->markmodel->name}}</h5>
                                  <div class="price d-flex flex-row align-items-center"> <span class="act-price">{{$item->price}}</span>
                                  </div>
                              </div>
                                <h5 class="text-uppercase">Color: </h5><span class="dot" style="background-color: {{$item->color->name}}"></span>
                              <h5 class="text-uppercase">Description: </h5>
                              {{-- accordion --}}
                              <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Description
                                    </button>
                                  </h2>
                                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <ul>
                                        <p class="about">{{$item->description}}</p>
                                      </ul> 
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Tech data
                                    </button>
                                  </h2>
                                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <ul>
   
                                          <li>Transmission: {{$item->techdata->transmission->type}}</li>
                                          <li>State: {{$item->techdata->state->name}}</li>
                                          <li>Year: {{$item->techdata->year}}</li>
                                          <li>Form: {{$item->techdata->form->name}}</li>
                                       </ul> 
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      Auto history
                                    </button>
                                  </h2>
                                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <ul>
                                        <li>Mileage: {{$item->autohistory->mileage}}</li>
                                        <li>Number of users: {{$item->autohistory->num_users}}</li>
                                        <li>Last technical inspection: {{$item->autohistory->last_tech_insp}}</li>
                                     </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                      Fuel and consumption
                                    </button>
                                  </h2>
                                  <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <ul>
                                        
                                        @foreach ($item->techdata->fuel as $fuel)
                                          <li>Type of fuel: {{$fuel->type}}, consumption: {{$fuel->pivot->consumption}}</li>
                                        @endforeach
                                        
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- end accordion --}}
                              <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                              @if ($item->user->id === auth()->id())
                                  <form action="{{route('singleitem.destroy', ['id' => $item->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete item</button>
                                  </form>
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    @include('layouts.footer')
<script>
   function change_image(image){
    var container = document.getElementById("main-image");
    container.src = image.src;
    }
    document.addEventListener("DOMContentLoaded", function(event) {
    });
</script>
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
      }, 700); // Duration of the fade out animation in milliseconds
    });
  });
</script>
</body>
</html>