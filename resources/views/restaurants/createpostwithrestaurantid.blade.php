<!DOCTYPE html>
<html>

<head>
    <title>Restaurant Category</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('restaurants') }}">Restaurants Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('restaurants') }}">View All Restaurants</a></li>
                <li><a href="{{ URL::to('restaurants/create') }}">Create a Restaurant</a>
            </ul>
        </nav>
        <h1>Showing {{ $restaurants->name }}</h1>
        <div class="jumbotron text-center">
            <p>Restaurant Name: {{ $restaurants->name }}</p>
            <p>Restaurant Phone: {{ $restaurants->phone }}</p>
            <p>Restaurant Address Line 1: {{ $restaurants->address1 }}</p>
            <p>Restaurant Address Line 2: {{ $restaurants->address2 }}</p>
            <p>Suburb: {{ $restaurants->suburb }}</p>
            <p>The state of the restaurant located: {{ $restaurants->state }}</p>
            <p>Number seats in the restaurant: {{ $restaurants->numberofseats }}</p>
            <p>Country ID: {{ $restaurants->country_id }}</p>
            <p>Category ID: {{ $restaurants->category_id }}</p>
        </div>
        <h1>Create a Post</h1>
        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }} @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif {{ Form::open(array('url' => 'restaurants/createpostwithrestaurantid')) }}
        <div class="form-group">
            {{ Form::label('content', 'Post Content') }} {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('user_id', 'User ID') }} {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
        </div>
        {{ Form::hidden('restaurant_id', $restaurants->id, array('restaurant_id' => 'restaurant_id')) }}
        {{ Form::submit('Create the Post Detail!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>


</body>

</html>
