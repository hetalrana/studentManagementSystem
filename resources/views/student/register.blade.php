<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3 class="mb-4">Student Registration</h3>

    <!-- Global Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>First Name</label>
                <input type="text" name="firstname"
                       class="form-control @error('firstname') is-invalid @enderror"
                       value="{{ old('firstname') }}">
                @error('firstname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="lastname"
                       class="form-control @error('lastname') is-invalid @enderror"
                       value="{{ old('lastname') }}">
                @error('lastname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Password</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation"
                       class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label>Mobile No</label>
            <input type="text" name="mobileno"
                   class="form-control @error('mobileno') is-invalid @enderror"
                   value="{{ old('mobileno') }}">
            @error('mobileno')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender"
                    class="form-control @error('gender') is-invalid @enderror">
                <option value="">Select</option>
                <option value="male" {{ old('gender')=='male'?'selected':'' }}>Male</option>
                <option value="female" {{ old('gender')=='female'?'selected':'' }}>Female</option>
                <option value="other" {{ old('gender')=='other'?'selected':'' }}>Other</option>
            </select>
            @error('gender')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dateofbirth"
                   class="form-control @error('dateofbirth') is-invalid @enderror"
                   value="{{ old('dateofbirth') }}">
            @error('dateofbirth')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address"
                      class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Profile Image</label>
            <input type="file" name="image"
                   class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Register</button>
        <a href="/login" class="btn btn-link">Already have account?</a>
    </form>
</div>

</body>
</html>
