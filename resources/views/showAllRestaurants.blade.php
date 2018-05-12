<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Existing Restaurants</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <h1 align="center">Melbourne dining restaurants</h1>
        <div class="container" align="center">
            <br/>
            <table border="1">
                <tr>
                    <th>Restaurant Name</th>
                    <th>Restaurant Phone</th>
                    <th>Restaurant Address Line 1</th>
                    <th>Restaurant Address Line 2</th>
                    <th>Suburb</th>
                    <th>State</th>
                    <th>Number seats in the restaurant</th>
                </tr>
                @for($i = 0; $i < count($restaurants); $i++)
                <tr>
                    <td>{{ $restaurants[$i]->restname }}</td>
                    <td>{{ $restaurants[$i]->restphone }}</td>
                    <td>{{ $restaurants[$i]->restaddress1 }}</td>
                    <td>{{ $restaurants[$i]->restaddress2 }}</td>
                    <td>{{ $restaurants[$i]->suburb }}</td>
                    <td>{{ $restaurants[$i]->state }}</td>
                    <td>{{ $restaurants[$i]->numberofseats }}</td>
                </tr>
            @endfor
            </table><br/>
        {{	$restaurants->links('vendor.pagination.bootstrap-4')	}}
        </div>
    </body>
</html>
