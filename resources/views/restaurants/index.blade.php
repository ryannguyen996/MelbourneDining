<!DOCTYPE html>
<html>

<head>
    <title>Restaurant (Index)</title>
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
        <h1>All the Restaurants</h1>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Restaurant Address Line 1</th>
                    <th>Restaurant Address Line 2</th>
                    <th>Suburb</th>
                    <th>State</th>
                    <th>Number of seats</th>
                    <th>Country ID</th>
                    <th>Country</th>
                    <th>Category ID</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($restaurants as $key => $value)
                <tr>
                    <td><a href="{{ URL::to('restaurantwithdetails/' . $value->id)}}">{{ $value->name }}</a></td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->address1 }}</td>
                    <td>{{ $value->address2 }}</td>
                    <td>{{ $value->suburb }}</td>
                    <td>{{ $value->state }}</td>
                    <td>{{ $value->numberofseats }}</td>
                    <td>{{ $value->country_id }}</td>
                    <td>{{ $value->country->name }}</td>
                    <td>{{ $value->category_id }}</td>
                    <td>{{ $value->category->name }}</td>
                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        <!-- delete the order (uses the destroy method DESTROY /orders/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        <!-- Show the order (uses the show method found at GET /orders/{id} -->
                        {{ Form::open(array('url' => 'restaurants/' . $value->id, 'class' => 'pull-right')) }} {{ Form::hidden('_method', 'DELETE') }} {{ Form::submit('Delete this Restaurant', array('class' => 'btn btn-warning')) }} {{ Form::close() }}
                        <a class="btn btn-small btn-success" href="{{ URL::to('restaurants/' . $value->id) }}">Show this Restaurant</a>
                        <!-- Edit this order (uses the edit method found at GET /orders/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('restaurants/' . $value->id . '/edit') }}">Edit this Restaurant</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
