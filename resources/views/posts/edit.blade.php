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
        <h1>Edit {{ $posts->name }}</h1>
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }} {{ Form::model($posts, array('route' => array('posts.update', $posts->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('content', 'Post Content') }} {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('post_id', 'Post ID') }} {{ Form::text('post_id', Input::old('post_id'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('user_id', 'User ID') }} {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
        </div>
        {{ Form::submit('Edit the Post!', array('class' => 'btn btn-primary')) }} {{ Form::close() }}
    </div>
</body>

</html>
