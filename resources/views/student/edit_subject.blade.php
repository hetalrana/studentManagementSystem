<!DOCTYPE html>
<html>
<head>
    <title>Edit Subject</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3>Edit Subject</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/subject/update/'.$subject->id) }}">
        @csrf
        <div class="mb-3">
            <input type="text" name="subject" class="form-control" value="{{ old('subject', $subject->subject) }}">
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
