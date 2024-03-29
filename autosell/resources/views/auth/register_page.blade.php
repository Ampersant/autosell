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
    <link href="{{ asset('css/login-register.css')}}" rel="stylesheet" />
	<script src="{{ asset('js/login-register.js')}}" type="text/javascript"></script>

    <title>Register form</title>
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
           <form method="post" html="{:multipart=>true}" data-remote="true" action="{{ route('register') }}" accept-charset="UTF-8">
           @csrf
            <input id="email" class="form-control mt-3" type="text" placeholder="Email" name="email">
            <input id="username" class="form-control mt-3" type="text" placeholder="Username" name="username">
           <select id="acType" name="role" class="form-select mt-3 p-2">
               <option selected>Type of account</option>
           </select>
           <div class="row mt-3">
               <div class="col-md-6">
                   <input type="text" class="form-control" name="name" id="name" placeholder="Name(optional)">
               </div>
               <div class="col-md-6">
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname(optional)">
               </div>

           </div>
           <input type="text" class="form-control mt-3" name="phone" id="phone" placeholder="Phone(optional)">
           <input id="password" class="form-control mt-3" type="password" placeholder="Password" name="password">
           <input id="password_confirmation" class="form-control mt-3" type="password" placeholder="Repeat Password" name="password_confirmation">
           
           <input class="btn btn-default btn-register mt-3" type="submit" value="Create account" name="commit">
           </form>
           </div>
       </div>
    </div>
    <script>
        $(document).ready(function(){
        // Функция для выполнения AJAX-запроса
        function fetchDataFromAPI() {
            $.ajax({
                url: '/api/roles',
                type: 'GET',
                success: function(response) {
                    var arr = JSON.parse(response);
                    const selectElement = document.getElementById('acType');
                    arr.forEach(element => {
                        const option = document.createElement('option');
                        option.value = element.id;
                        option.text = element.name;
                        selectElement.appendChild(option);
                    });
                },
                error: function(xhr, status, error) {
                    // Обработка ошибки
                    console.error(error);
                }
            });
        }
    
        // Вызываем функцию для выполнения запроса при загрузке страницы или при каком-либо событии
        fetchDataFromAPI();
    });
    </script>
</body>
</html>