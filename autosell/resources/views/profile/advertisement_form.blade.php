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
    <script src="{{ asset('js/adform/nextform.js') }}"></script>
    
    <script src="{{ asset('js/adform/getmodel.js') }}"></script>

    <title>Document</title>
</head>
<body>
    @include('profile.sidebar')
    
        <form action="" method="post">
          <div class="card" style="background-color:rgb(240, 240, 240);height: 80vh; width: 50%; align-content: center; margin: auto; overflow:hidden">
          <div id="form1" class="container col-md-5">
            <div class="nice-form-group">
              <label>Mark</label>
              <select id="mark">
                <option value="null">Please select a mark</option>
                @foreach ($marks as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="nice-form-group">
              <label>Model</label>
              <select id="model" disabled>
                <option selected>Please select a model</option>
              </select>
            </div>
            <div class="nice-form-group">
              <label>Description</label>
              <textarea rows="5" placeholder="Write a description about Your auto." value=""></textarea>
            </div>
            <button type="button" id="goto2" class="mt-2 button-28">Next 1/3</button>
          </div>

            <div id="form2" class="container col-md-5 hidden">
              <div class="nice-form-group">
                <label>State</label>
                <input type="range" min="0" max="6" />
              </div>
              <div class="nice-form-group">
                <input type="checkbox" id="check-3" class="switch" />
                <label for="check-3">Switch with label</label>
              </div>
            
              <div class="nice-form-group">
                <input type="checkbox" id="check-4" class="switch"/>
                <label for="check-4">
                  Switch with label
                  <small>I am additional information regarding this field</small>
                </label>
              </div>
              <div class="row">
                  <div class="col-md-6">
                  <button type="button" id="backTo1" class="mt-2 button-28">Back</button>
                </div>
                <div class="col-md-6">
                  <button type="button" id="goto3" class="mt-2 button-28">Next 2/3</button>
                </div>
              </div>

          <div id="form3" class="container col-md-5 hidden">
            <div class="nice-form-group">
              <input type="checkbox" id="check-4" class="switch"/>
              <label for="check-4">
                Switch with label
                <small>I am additional information regarding this field</small>
              </label>
            </div>
            <div class="row">
              <div class="col-md-6">
                <button type="button" id="backTo2" class="mt-2 button-28">Back</button>
              </div>
              <div class="col-md-6">
                <input type="submit" id="submitForm" class="mt-2 button-28">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </form>
</body>
</html>