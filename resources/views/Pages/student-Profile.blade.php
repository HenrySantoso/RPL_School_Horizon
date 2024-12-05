@extends('layouts.student-layout')
@section('title', 'Student Dashboard')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Welcome, {{ $student['name'] }}!</h4>

    <!-- Student Information Section -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <strong>Student Information</strong>
            <!-- Edit Profile Button -->
            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                Edit Profile
            </button>
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

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('student.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $student['name'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="Male" {{ $student['gender'] == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $student['gender'] == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Major</label>
                        <input type="text" class="form-control" id="major" name="major" value="{{ $student['major'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Enrollment Year</label>
                        <input type="number" class="form-control" id="year" name="year" value="{{ $student['year'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $student['email'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $student['phone'] }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
