<!DOCTYPE html>
<html>

<head>
    <title>Post Category</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('posts') }}">Posts Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('posts') }}">View All Posts</a></li>
                <li><a href="{{ URL::to('posts/create') }}">Create a Post</a>
            </ul>
        </nav>
        <h1>Showing {{ $posts->name }}</h1>
        <div class="jumbotron text-center">
            <p>Post Content: {{ $posts->content }}</p>
            <p>Restaurant Name: {{ $posts->restaurant->name }}</p>
            <p>User Name: {{ $posts->user->name }}</p>
        </div>
        <a href="{{ URL::to('posts/createcommentwithpostid/' . $posts->id) }}">Create a Comment</a>
        <h1>Related Comments</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Comment Content</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts->comment as $key => $value)
                <tr>
                    <td>{{ $value->user->name }}</td>
                    <td>{{ $value->content }}</td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
