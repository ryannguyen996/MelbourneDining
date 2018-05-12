<!DOCTYPE html>
<html>

<head>
    <title>Role Category</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('roles') }}">Roles Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('roles') }}">View All Roles</a></li>
                <li><a href="{{ URL::to('roles/create') }}">Create a Role</a>
            </ul>
        </nav>
        <h1>Showing {{ $roles->name }}</h1>
        <div class="jumbotron text-center">
            <p>Name: {{ $roles->name }}</p>
        </div>
        <h1>List user</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles->user as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->country->name }}</td>
                </tr>
                 @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>
