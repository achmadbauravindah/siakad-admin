<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    --}}
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form method="POST" action="{{ route('rolesLogin') }}" class="sign-in-form">
                    @csrf
                    <h2 class=" title">L O G I N</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="username" type="text" class="form-control" name="username"
                            placeholder="username (nim/nip)" autofocus value="190411100015">
                    </div>
                    @error('username')
                    <div class="mt-3" style="color:red;">{{ $message }}</div>
                    @enderror
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password" class="form-control " placeholder="password"
                            name="password" autocomplete="current-password" value="123123"/>
                    </div>
                    @error('password')
                    <div class="mt-3" style="color:red;">{{ $message }}</div>
                    @enderror
                    <div>
                        <select name="level" style="border-radius: 1rem;">
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                        </select>
                    </div>
                    <button class="btn solid" type="submit" name="submit">L O G I N</button>
                    <!-- FLASH MESSAGE -->
                    @if(session()->has('error'))
                    <div class="mt-3" style="color:red;">Username or password is incorrect</div>
                    @endif
                </form>
                <a href="{{ route('viewAdminLogin') }}" style="text-align: center; color:gray;">Go to Admin</a>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Welcome Siakad - Admin</h3>
                    <p>
                        Silahkan login untuk masuk kedalam halaman siakad
                    </p>
                </div>
                <img src="{{ asset('img/logins.svg') }}" class="image" alt="" />
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/auth.js') }}"></script>
</body>

</html>
