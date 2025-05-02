@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Student Name</label>
            <input type="text" name="student_name" class="form-control" value="{{ $student->student_name }}" required>
        </div>

        <div class="mb-3">
            <label>Class</label>
            <input type="text" name="class" class="form-control" value="{{ $student->class }}" required>
        </div>

        <div class="mb-3">
            <label>Admission Date</label>
            <input type="date" name="admission_date" class="form-control" value="{{ $student->admission_date }}" required>
        </div>

        <div class="mb-3">
            <label>Yearly Fees</label>
            <input type="number" name="yearly_fees" class="form-control" value="{{ $student->yearly_fees }}" required>
        </div>

        <div class="mb-3">
            <label>Class Teacher</label>
            <select name="class_teacher_id" class="form-control" required>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $teacher->id == $student->class_teacher_id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
