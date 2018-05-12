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
        <h1>Related Posts</h1>
        <a href="{{ URL::to('restaurants/createpostwithrestaurantid/' . $restaurants->id) }}">Create a Post</a>
        @foreach($restaurants->post as $key => $value)
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Post content</th>
                    <th>Created timestamp</th>
                    <th>Created user name</th>
                    <th>User country name</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{ $value->content }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->user->name }}</td>
                    <td>{{ $value->user->country->name }}</td>
                </tr>

            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Comment content</th>
                    <th>Created timestamp</th>
                    <th>Created user name</th>
                    <th>User country name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($value->comment as $key => $value)
                <tr>
                    <td>{{ $value->content }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->user->name }}</td>
                    <td>{{ $value->user->country->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <hr>
        @endforeach
    </div>

</body>

</html>
