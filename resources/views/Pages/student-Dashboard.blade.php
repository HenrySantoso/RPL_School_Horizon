@extends('layouts.student-layout')
@section('title', 'Student Dashboard')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Welcome, Henry!</h4>

    <!-- Student Information Section -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Student Information</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="w-25">Student ID</th>
                        <td>{{ Auth::user()->username }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>Henry Yohanes Santoso</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>Pria</td>
                    </tr>
                    <tr>
                        <th>Program</th>
                        <td>Computer Science</td>
                    </tr>
                    <tr>
                        <th>Enrollment Year</th>
                        <td>2022</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>henry.santoso@si.ukdw.ac.id</td>
                    </tr>
                    <tr>
                        <th>Number Phone</th>
                        <td>087612344321</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Academic Information Section -->
    {{-- <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <strong>Academic Information</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="w-25">Current Semester</th>
                        <td>Semester 5</td>
                    </tr>
                    <tr>
                        <th>Completed Credits</th>
                        <td>80 SKS</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}

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
