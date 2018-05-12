<!DOCTYPE html>
<html>

<head>
    <title>Create Category</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('categories') }}">Categories Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('categories') }}">View All Categories</a></li>
                <li><a href="{{ URL::to('categories/create') }}">Create a Category</a>
            </ul>
        </nav>
        <h1>Edit {{ $categories->name }}</h1>
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }} {{ Form::model($categories, array('route' => array('categories.update', $categories->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }} {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>
        {{ Form::submit('Edit the Category!', array('class' => 'btn btn-primary')) }} {{ Form::close() }}
    </div>
</body>

</html>
