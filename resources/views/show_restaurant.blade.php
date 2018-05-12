<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Restaurants</title>
</head>
    <style>
table, th, td {
    border: 1px solid black;
}
</style>
<body>
<table>
<tr >
<th>Restaurants</th>
<th>Location</th>
<th>Cusinie Type</th>
</tr>
 @foreach ($restaurants as $restaurant)
    <tr><td>{{ $restaurant[0] }}</td><td>{{ $restaurant[1] }}</td><td>{{ $restaurant[2] }}</td></tr>
 @endforeach
    </table>
</body>
</html>
