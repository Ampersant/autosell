
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/chat/chat.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <title>Document</title>

</head>
<body>
    @include('profile.sidebar')
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            @foreach ($chats as $chat)
                            <li class="clearfix">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                <div class="about">
                                    <div class="name">{{$chat->name}}</div>
                                    <div class="status"> <i class="fa fa-circle offline"></i> Last time message </div>                                            
                                </div>
                            </li>
                            @endforeach

                            
                        </ul>
                    </div>
                    <div class="chat">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">{{ $chats->first()->name }}</h6>
                                        <small>{{ $chats->first()->updated_at }}</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 hidden-sm text-end">
                                    <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="chat-history">
                            <ul class="m-b-0">
                                @foreach ($chat->first()->messages as $message)
                                    @if ($message->user_id === auth()->user()->id)
                                        <li class="clearfix">
                                            <div class="message-data text-end">
                                                <span class="message-data-time">10:10 AM, Today</span>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                            </div>
                                            <div class="message other-message float-right">{{$message->text}}</div>
                                        </li>
                                    @else
                                        <li class="clearfix">
                                            <div class="message-data">
                                                <span class="message-data-time">10:12 AM, Today</span>
                                            </div>
                                            <div class="message my-message">{{$message->text}}</div>                                    
                                        </li>  
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                
                                <form action="{{route('message.send', ['chatId' => $chats->first()->id])}}" method="post">
                                    @csrf
                                    <input type="text" name="message" class="form-control" placeholder="Enter text here...">
                                    <div class="input-group-prepend"> 
                                        <button type="submit"><span class="input-group-text"><i class="fa fa-send"></i></span></button>
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="module">
    Echo.private(`message.${userId}`)
        .listen('MessageEvent', (e) => {
            console.log(e);
        });
</script>
</html>


