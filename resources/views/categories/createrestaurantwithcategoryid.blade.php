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
        <h1>Showing {{ $categories->name }}</h1>
        <div class="jumbotron text-center">
            <p>Name: {{ $categories->name }}</p>
        </div>
        <h1>Create a Restaurant</h1>
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}
        @if (Session::has('message'))
         <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        {{ Form::open(array('url' => 'categories/createrestaurantwithcategoryid')) }}
        <div class="form-group">
            {{ Form::label('name', 'Restaurant Name') }} {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('phone', 'Restaurant Phone') }} {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('address1', 'Restaurant Address Line 1') }} {{ Form::text('address1', Input::old('address1'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('address2', 'Restaurant Address Line 2') }} {{ Form::text('address2', Input::old('address2'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('suburb', 'Suburb') }} {{ Form::text('suburb', Input::old('suburb'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('state', 'The state of the restaurant located') }} {{ Form::text('state', Input::old('state'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('numberofseats', 'Number of seats in the restaurant') }} {{ Form::text('numberofseats', Input::old('numberofseats'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('country_id', 'Country ID') }} {{ Form::text('country_id', Input::old('country_id'), array('class' => 'form-control')) }}
        </div>
        {{ Form::hidden('category_id', $categories->id, array('category_id' => 'category_id')) }}
        {{ Form::submit('Create the Restaurant!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
</body>
</html>
