<div>
    <h1>ITS MY PROFILE!!!</h1>
    <form action="{{ route('logout')}}" method="post">
        @csrf
        <input type="submit" value="Logout">
    </form>
</div>