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
        <a href="{{ URL::to('countries/createrestaurantwithcountryid/' . $countries->id) }}">Create a Restaurant</a>
        <h1>Related Restaurants</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Restaurant Name</th>
                    <th>Restaurant Phone</th>
                    <th>Restaurant Address Line 1</th>
                    <th>Restaurant Address Line 2</th>
                    <th>Suburb</th>
                    <th>State</th>
                    <th>Number seats in the restaurant</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries->restaurant as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->address1 }}</td>
                    <td>{{ $value->address2 }}</td>
                    <td>{{ $value->suburb }}</td>
                    <td>{{ $value->state }}</td>
                    <td>{{ $value->numberofseats }}</td>
                    <td>{{ $value->category->name }}</td>
                </tr>
                 @endforeach
            </tbody>
        </table>

        <h1>Related Users</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries->user as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
