@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Student Name</label>
            <input type="text" name="student_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Class</label>
            <input type="text" name="class" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Admission Date</label>
            <input type="date" name="admission_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Yearly Fees</label>
            <input type="number" name="yearly_fees" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Class Teacher</label>
            <select name="class_teacher_id" class="form-control" required>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
