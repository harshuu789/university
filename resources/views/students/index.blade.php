@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Students List</h2>

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" class="mb-3">
        <input type="text" name="search" placeholder="Search..." class="form-control" value="{{ request('search') }}">
    </form>

    <table class="table table-bordered" id="students-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Admission Date</th>
                <th>Yearly Fees</th>
                <th>Class Teacher</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->student_name }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->admission_date }}</td>
                <td>{{ $student->yearly_fees }}</td>
                <td>{{ $student->teacher->name }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning px-3 mr-2 mb-1">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

   <div class="d-flex justify-content-center mt-4">
    {{ $students->links('pagination::bootstrap-5') }}
</div>

</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#students-table').DataTable();
    });
</script>
@endpush
