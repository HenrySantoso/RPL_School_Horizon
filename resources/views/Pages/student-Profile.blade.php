@extends('layouts.student-layout')
@section('title', 'Student Dashboard')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Welcome, {{ $student['name'] }}!</h4>

    <!-- Student Information Section -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Student Information</strong>
        </div>
        <div class="card-body">
            @if ($student)
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="w-25">Student ID</th>
                        <td>{{ $student['student_id'] }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $student['name'] }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $student['gender'] }}</td>
                    </tr>
                    <tr>
                        <th>Major</th>
                        <td>{{ $student['major'] }}</td>
                    </tr>
                    <tr>
                        <th>Enrollment Year</th>
                        <td>{{ $student['year'] }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $student['email'] }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $student['phone'] }}</td>
                    </tr>
                </tbody>
            </table>
            @else
            <p>No student information available.</p>
            @endif
        </div>
    </div>

    <!-- Important Announcements Section -->
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <strong>Important Announcements</strong>
        </div>
        <div class="card-body">
            <ul>
                <li>Next semester registration opens on 1st December 2024.</li>
                <li>Final exam schedule will be announced on the 30th November 2024.</li>
                <li>Tuition fee payment deadline: 10th December 2024.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
