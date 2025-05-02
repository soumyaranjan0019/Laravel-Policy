<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h3>Login</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('loginMatch') }}" method="POST">
            @csrf
                <div class="mb-3">
                    <label for="useremail"class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="useremail">
                </div>

                <div class="mb-3">
                    <label for="userpassword"class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="userpassword">
                </div>

                <button type="submit" class="btn btn-dark">Login</button>
                {{-- <a href="/" class="btn btn-secondary">Back</a> --}}
            </form>
        </div>

        @if($errors->any())
            <div class="card-footer text-body-secondary">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

    </div>
</body>
</html>
