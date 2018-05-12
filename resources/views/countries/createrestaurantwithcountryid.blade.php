<!DOCTYPE html>
<html>

<head>
    <title>Country Category</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('countries') }}">Countries Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('countries') }}">View All Countries</a></li>
                <li><a href="{{ URL::to('countries/create') }}">Create a Country</a>
            </ul>
        </nav>
        <h1>Showing {{ $countries->name }}</h1>
        <div class="jumbotron text-center">
            <p>Name: {{ $countries->name }}</p>
        </div>
        <h1>Create a Restaurant</h1>
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}
        @if (Session::has('message'))
         <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        {{ Form::open(array('url' => 'countries/createrestaurantwithcountryid')) }}
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
            {{ Form::label('category_id', 'Category ID') }} {{ Form::text('category_id', Input::old('category_id'), array('class' => 'form-control')) }}
        </div>
        {{ Form::hidden('country_id', $countries->id, array('country_id' => 'country_id')) }}
        {{ Form::submit('Create the Restaurant!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    </body>
</html>
