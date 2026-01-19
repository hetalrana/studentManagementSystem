<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Student Dashboard</span>

        <div class="ms-auto">
            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-outline-light btn-sm">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            Welcome, {{ auth()->user()->name }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if(auth()->user()->student->image)
                        <img src="{{ asset('storage/'.auth()->user()->student->image) }}"
                             class="img-thumbnail mb-3" width="150">
                    @else
                        <img src="https://via.placeholder.com/150"
                             class="img-thumbnail mb-3">
                    @endif
                </div>

                <div class="col-md-8">
                    <p><strong>First Name:</strong> {{ auth()->user()->student->firstname }}</p>
                    <p><strong>Last Name:</strong> {{ auth()->user()->student->lastname }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Mobile:</strong> {{ auth()->user()->student->mobileno }}</p>
                    <p><strong>Gender:</strong> {{ auth()->user()->student->gender }}</p>
                    <p><strong>DOB:</strong> {{ auth()->user()->student->dateofbirth }}</p>
                    <p><strong>Address:</strong> {{ auth()->user()->student->address }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">Add Subject</div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/subject/add') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="subject" class="form-control" placeholder="Subject Name" value="{{ old('subject') }}">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>

            <h5 class="mt-3">Subjects</h5>
            <table class="table table-stripedvw-auto">
                <thead>
                <tr>
                    <th class="w-75">Subject</th>
                    <th class="w-25">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($student->subjects as $subject)
                    <tr >
                        <td class="w-75">{{ $subject->subject }}</td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ url('/subject/edit/'.$subject->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form method="POST" action="{{ url('/subject/delete/'.$subject->id) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                   <tr> <td colspan="2" class="text-center">No subjects available.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>

</body>
</html>
