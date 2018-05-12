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
        <h1>Edit {{ $users->name }}</h1>
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }} {{ Form::model($users, array('route' => array('users.update', $users->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }} {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email') }} {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password') }} {{ Form::password('password', Input::old('password'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('country_id', 'Country_id') }} {{ Form::text('country_id', Input::old('country_id'), array('class' => 'form-control')) }}
        </div>
        {{ Form::submit('Edit the User!', array('class' => 'btn btn-primary')) }} {{ Form::close() }}
    </div>
</body>

</html>
