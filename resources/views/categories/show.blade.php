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
        <a href="{{ URL::to('categories/createrestaurantwithcategoryid/' . $categories->id) }}">Create a Restaurant</a>
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
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories->restaurant as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->address1 }}</td>
                    <td>{{ $value->address2 }}</td>
                    <td>{{ $value->suburb }}</td>
                    <td>{{ $value->state }}</td>
                    <td>{{ $value->numberofseats }}</td>
                    <td>{{ $value->country->name }}</td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
