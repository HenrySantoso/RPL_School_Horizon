<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <h1>Categories</h1>

    @if (!empty($categories))
        <table border="1">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category['categoryId'] }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>{{ $category['description'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No categories available.</p>
    @endif
</body>
</html>
