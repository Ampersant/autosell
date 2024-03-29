

    {{-- <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet" /> --}}

	<link href="{{ asset('css/login-register.css')}}" rel="stylesheet" />
	{{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> --}}

	{{-- <script src="{{ asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script> --}}
	{{-- <script src="{{ asset('js/bootstrap.js')}}" type="text/javascript"></script> --}}
	<script src="{{ asset('js/login-register.js')}}" type="text/javascript"></script>

    <div class="container">
        <div class="row">
		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <h4 class="modal-title">Login with</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                                <div class="social">
                                    <a class="circle github" href="#">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="#">
                                        <i class="fa-brands fa-google-plus"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="#">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                      <span>or</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="post" action="{{ route('login') }}" accept-charset="UTF-8">
                                        @csrf
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                    <input class="btn btn-default btn-login" type="submit" value="Login">
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="{{ route('register') }}" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <select id="acType" class="form-select mt-1 p-2">
                                    <option selected>Type of account</option>
                                </select>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name(optional)">
                                    </div>
                                    <div class="col-md-6">
                                     <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname(optional)">
                                    </div>

                                </div>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone(optional)">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                                
                                <input class="btn btn-default btn-register" type="submit" value="Create account" name="commit">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
    		      </div>
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
