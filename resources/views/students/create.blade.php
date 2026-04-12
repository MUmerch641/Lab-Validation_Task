@extends('layouts.app')

@section('title', 'Create Student')

@section('content')
    <section class="panel panel-narrow">
        <h1 class="page-title">Create Student</h1>
        <p class="page-subtitle">Add a new student while keeping data validated and clean.</p>

        <form action="{{ route('students.store') }}" method="POST" class="form-card">
            @csrf
            @include('students._form')
        </form>
    </section>
@endsection
