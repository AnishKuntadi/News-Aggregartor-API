<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF token for Axios -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>Register</title>

    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="card p-4">
                    <h3 class="text-center mb-4">Register</h3>
                    <form id="register-form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                        <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}">Login Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Include the register.js -->
    <script type="module" src="{{ asset('js/register.js') }}"></script>
</body>
</html>
