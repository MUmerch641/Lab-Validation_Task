@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <section class="panel">
        <div class="panel-head">
            <div>
                <h1 class="page-title">Students</h1>
                <p class="page-subtitle">Manage records with a cleaner personalized layout.</p>
            </div>
            <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
        </div>

        @if ($students->isEmpty())
            <div class="empty-state">
                <h2>No students yet</h2>
                <p>Start by adding your first student record.</p>
            </div>
        @else
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Section</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->roll_no }}</td>
                                <td>{{ $student->section }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->address }}</td>
                                <td>
                                    <div class="row-actions">
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-small btn-muted">Edit</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-small btn-danger" onclick="return confirm('Delete this student?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
