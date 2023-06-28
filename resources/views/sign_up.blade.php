<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">


    <title>Sign Up</title>
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col--6 mx-auto">
                <div class="card border-0 rounded-0 p-4 shadow">
                    <h2 class="text-center text-uppercase mb-3">Sign up</h2>
                    <form action="" method="post">
                        {{ csrf_field() }}

                        <div class="form-group mb-4">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0 border-0 bg-white"><i class="fa fa-user fa-lg text-muted"></i></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control rounded-0 border-left-0" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0 border-0 bg-white"><i class="fa fa-mobile-alt fa-lg text-muted"></i></span>
                                </div>
                                <input type="tel" name="phone_number" id="phone" class="form-control rounded-0 border-left-0" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0 border-0 bg-white"><i class="fas fa-lock fa-lg text-muted"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control rounded-0 border-left-0" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0 border-0 bg-white"><i class="fas fa-lock fa-lg text-muted"></i></span>
                                </div>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control rounded-0 border-left-0" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" name="SignUp" value="Sign Up" class="btn btn-lg btn-primary btn-block btn-rounded d-flex justify-content-center align-items-center">
                            
                            @if ( !empty($result) )

                                <p class="mt-3 text-center alert alert-danger" > {{ $result }} </p>
                                
                            @endif
                            @if ($errors->any())
                                <div class="mt-3 text-center alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <p class="mt-3 text-center">Already have an account? <a href="{{ url('/login') }}" class="link">Login</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css') }}">

    <!-- jQuery -->
    <script src="{{ url('https://code.jquery.com/jquery-3.5.1.slim.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js') }}"></script>
</body>

</html>