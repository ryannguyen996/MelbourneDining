<!DOCTYPE html>
<html>

<head>
    <title>Comment Category</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('comments') }}">Comments Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('comments') }}">View All Comments</a></li>
                <li><a href="{{ URL::to('comments/create') }}">Create a Comment</a>
            </ul>
        </nav>
        <h1>Showing {{ $comments->name }}</h1>
        <div class="jumbotron text-center">
            <p>Comment Content: {{ $comments->content }}</p>
            <p>Post Content: {{ $comments->post->content }}</p>
            <p>Post User name: {{ $comments->user->name }}</p>
            <p>Restaurant Name: {{ $comments->post->restaurant->name }}</p>
        </div>

    </div>
</body>

</html>
