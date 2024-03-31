<!DOCTYPE html>
<html xmlns:th="http://www.thymleaf.org" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.thymleaf.org ">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Management System</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Student Management System</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    </div>
</nav>

<div class="container">
    <div class="row">
        <h1>List Students</h1>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm mb-3">Add Student</a>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Age</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td><img src="{{ asset($student->image) }}" style="width: 70px; height:70px;" alt="Img" /></td>
                <td>{{ $student->age }}</td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input status-toggle" type="checkbox" id="statusToggle_{{ $student->id }}"
                               data-student-id="{{ $student->id }}" @if($student->status === 'active') checked @endif>
                        <label class="form-check-label" for="statusToggle_{{ $student->id }}"></label>
                    </div>
                </td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Update</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="width:77px; margin-top:" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.status-toggle').on('change', function () {
            var studentId = $(this).data('student-id');
            var status = $(this).prop('checked') ? 'active' : 'inactive';
            updateStudentStatus(studentId, status);
        });

        function updateStudentStatus(studentId, status) {
            $.ajax({
               url: '/students/' + studentId + '/update-status',
               method: 'POST',
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
              data: {
                  status: status
              },
              success: function (response) {
                 console.log('Status updated successfully.');
              },
              error: function (xhr, status, error) {
                 console.error('Error updating status:', error);
              }
        });

      }
    });
</script>
</body>
</html>
