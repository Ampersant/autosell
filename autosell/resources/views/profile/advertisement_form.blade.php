<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/nice-form.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('js/adform/nextform.js') }}"></script>
    <script src="{{ asset('js/adform/getmodel.js') }}"></script>
    <script src="{{ asset('js/adform/staterange.js') }}"></script>
    <script src="{{ asset('js/adform/fuelcons.js') }}"></script>
    <script src="{{ asset('js/adform/colorselect.js') }}"></script>
    <script src="{{ asset('js/adform/datepicker.js') }}"></script>
    {{-- <script src="{{ asset('js/adform/preview.js') }}"></script> --}}
    <style>img {
      display: block;
      max-width: 50%;
      height: auto;
    }</style>
    <title>Document</title>
</head>
<body>
    @include('profile.sidebar')
    
        <form action="{{route('ad.form.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div id="card" class="content" style="background-color:rgb(240, 240, 240); height: 80vh; width: 50%; align-content: center; margin: auto; overflow: auto; position: relative; display: flex; justify-content: center; align-items:center;">
          <div id="form1" class="container col-md-5" style="position: absolute;">
            <div class="nice-form-group">
              <label>Type</label>
              <select id="type" name="type">
                <option value="null">Please select a type</option>
                @foreach ($types as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="nice-form-group">
              <label>Mark</label>
              <select id="mark" name="mark" disabled>
                <option selected value="null">Please select a type first</option>
              </select>
            </div>
            <div class="nice-form-group">
              <label>Model</label>
              <select id="model" name="model" disabled>
                <option selected>Please select a mark first</option>
              </select>
            </div>
            <div class="nice-form-group">
              <label>Description</label>
              <textarea name="description" rows="5" placeholder="Write a description about Your auto." value=""></textarea>
            </div>
            <div class="nice-form-group">
              <label>Price</label>
              <input name="price" type="text" class="form-control" placeholder="Enter the price" value="" />
            </div>
            <button type="button" id="goto2" class="mt-2 button-28">Next 1/3</button>
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
          </div>

            <div id="form2" class="container col-md-5 hidden"  style="position: absolute;">
              <div class="nice-form-group">
                <label>Form</label>
                <select id="form" name="form" disabled>
                  <option selected>Please select a type first</option>
                </select>
              </div>
              <div class="nice-form-group">
                <label>Transmission</label>
                <select id="transmission" name="transmission">
                  <option selected>Please select a transmission</option>
                  @foreach ($transmissions as $item)
                    <option value="{{$item->id}}">{{$item->type}}</option>
                  @endforeach
                </select>
              </div>
              <div class="nice-form-group">
                <label>State</label>
                <h6 id="output">There you will see selected state</h6>
                <input name="state" type="range" min="{{$states->first()->id;}}" max="{{$states->last()->id;}}" onchange="updateParagraph(this.value)"/>
              </div><br>
              <h6>Choose type of fuel: </h6>
              @foreach ($fuels as $fuel)
              <div class="nice-form-group">
                <input name="fueltype[]" type="checkbox" id="check-{{$fuel->id}}" value="{{$fuel->id}}" class="switch" onchange="toggleInput(this)"/>
                <label for="check-{{$fuel->id}}">{{$fuel->type}}</label>
                <input name="fuelconsumption[]" type="text" id="input-{{$fuel->id}}" class="mt-2" style="display: none;" placeholder="Input the consumption per 100 km">
              </div>
              @endforeach
              <div class="row">
                  <div class="col-md-6">
                  <button type="button" id="backTo1" class="mt-2 button-28">Back</button>
                </div>
                <div class="col-md-6">
                  <button type="button" id="goto3" class="mt-2 button-28">Next 2/3</button>
                </div>
              </div>
        </div>
        <div id="form3" class="container col-md-5 hidden" style="position: absolute;">
          <div class="nice-form-group">
            <div class="nice-form-group">
              <label id="selectedColor" for="colorselection">Select the color</label>
              <div id=colorselection class="btn-group">
                @foreach ($colors as $color)
                  <button type="button" class="btn btn-outline-secondary color-button" data-color="{{$color->name}}" data-color-id="{{$color->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="{{$color->name}}" class="bi bi-circle-fill" viewBox="0 0 16 16">
                      <circle cx="8" cy="8" r="8"></circle></svg>
                    <span class="visually-hidden">Button</span>
                  </button>
                @endforeach
                <input type="hidden" id="selectedColorInput" name="color" value="">
              </div>

            </div>
            {{-- <h6 class="m-2" id=""></h6> --}}
            <div class="nice-form-group">
              <label>Year of production</label>
              <input type="text" id="datepicker" name="year"/>
            </div>
            <div class="nice-form-group">
              <label>Mileage</label>
              <input name="mileage" type="text" placeholder="Enter the number of km" value="" />
            </div>
            <div class="nice-form-group">
              <label>Number of users</label>
              <input name="numusr" type="text" placeholder="Enter the number of users" value="" />
            </div>
            <div class="nice-form-group">
              <label>Date of last tachnical inspectation</label>
              <input name="date" type="date" value="2018-07-22" />
            </div>
            <div class="nice-form-group">
              <label>Image upload</label>
              <input id="fileInput" name="image[]" type="file" multiple />
            </div>
            <div class="row" id="preview"></div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <button type="button" id="backTo2" class="mt-2 button-28">Back</button>
            </div>
            <div class="col-md-6">
              <input type="submit" id="submitForm" class="mt-2 button-28" >
            </div>
          </div>
        </div>
      </form>
      <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';
    
    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      const reader = new FileReader();
      
      reader.onload = function(e) {
        const previewItem = document.createElement('div');
        previewItem.classList.add('col-md-6');
        const img = document.createElement('img');
        img.classList.add('preview-img');
        img.src = e.target.result;
        previewItem.appendChild(img);
        preview.appendChild(previewItem);
      }
      
      reader.readAsDataURL(file);
    }
  });
      </script>
</body>
</html>