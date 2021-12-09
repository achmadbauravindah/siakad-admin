<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/auth-admin.css') }}">
    <title>Login Admin</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ route('adminLogin') }}" method="post" class="box">
                        @csrf
                        <h1>admin</h1>
                        <p class="text-muted"> Please enter your login and password!</p>
                        <input type="text" name="username" placeholder="Username Admin" value="{{ old('username') }}">
                        @error('username')
                        <p class="text-danger"> {{ $message }}</p>
                        @enderror
                        <input type="password" name="password" placeholder="Password">
                        @error('password')
                        <p class="text-danger"> {{ $message }}</p>
                        @enderror
                        <input type="submit" name="submit" value="Login">
                        @if(session()->has('error'))
                        <p class="text-danger"> Username or password is incorrect</p>
                        @endif
                        <a href="{{ route('rolesLogin') }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- JS --}}
    <script src=""></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
</body>

</html>
