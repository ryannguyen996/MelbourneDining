<!DOCTYPE html>
<html>

<head>
    <title>User (Index)</title>
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
        <h1>All the Users</h1>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Country_id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->country_id }}</td>
                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        <!-- delete the order (uses the destroy method DESTROY /orders/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        <!-- Show the order (uses the show method found at GET /orders/{id} -->
                        {{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }} {{ Form::hidden('_method', 'DELETE') }} {{ Form::submit('Delete this User', array('class' => 'btn btn-warning')) }} {{ Form::close() }}
                        <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show this User</a>
                        <!-- Edit this order (uses the edit method found at GET /orders/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this User</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
