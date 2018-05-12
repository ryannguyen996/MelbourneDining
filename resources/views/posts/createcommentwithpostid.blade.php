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
        <h1>Create a Comment</h1>
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }} @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        {{ Form::open(array('url' => 'posts/createcommentwithpostid')) }}
        <div class="form-group">
            {{ Form::label('content', 'Comment Content') }} {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('user_id', 'User ID') }} {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
        </div>
        {{ Form::hidden('post_id', $posts->id, array('post_id' => 'post_id')) }}
        {{ Form::submit('Create the Comment Detail!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
</body>

</html>
