<!DOCTYPE html>
<html>

<head>
    <title>User Category</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('users') }}">Users Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('users') }}">View All Users</a></li>
                <li><a href="{{ URL::to('users/create') }}">Create a User</a>
            </ul>
        </nav>
        <h1>Showing {{ $users->name }}</h1>
        <div class="jumbotron text-center">
            <p>Name: {{ $users->name }}</p>
            <p>Email: {{ $users->email }}</p>
            <p>Country: {{ $users->country->name }}</p>
        </div>
        <h1>{{ $users->name }}'s Post</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Post Content</th>
                    <th>Restaurant Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users->post as $key => $value)
                <tr>
                    <td>{{ $value->content }}</td>
                    <td>{{ $value->restaurant->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h1>{{ $users->name }}'s Comment</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Post Content</th>
                    <th>Comment Content</th>
                    <th>Restaurant Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users->comment as $key => $value)
                <tr>
                    <td>{{ $value->post->content }}</td>
                    <td>{{ $value->content }}</td>
                    <td>{{ $value->post->restaurant->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
