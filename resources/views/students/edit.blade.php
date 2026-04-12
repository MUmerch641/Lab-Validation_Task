@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <section class="panel panel-narrow">
        <h1 class="page-title">Edit Student</h1>
        <p class="page-subtitle">Update the record without changing the underlying core flow.</p>

        <form action="{{ route('students.update', $student->id) }}" method="POST" class="form-card">
            @csrf
            @method('PUT')
            @include('students._form', ['student' => $student])
        </form>
    </section>
@endsection
