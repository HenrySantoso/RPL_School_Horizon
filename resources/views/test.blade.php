<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
    <h1>Students</h1>

    @if (!empty($students))
        <table border="1">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Year</th>
                    <th>Major</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student['student_id'] }}</td>
                        <td>{{ $student['name'] }}</td>
                        <td>{{ $student['gender'] }}</td>
                        <td>{{ $student['year'] }}</td>
                        <td>{{ $student['major'] }}</td>
                        <td>{{ $student['email'] }}</td>
                        <td>{{ $student['phone'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No students available.</p>
    @endif
</body>
</html>
