<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF token for Axios -->
    <title>Login</title>

    <!-- Bootstrap CSS (You can use the latest version from CDN) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="card p-4">
                    <h3 class="text-center mb-4">Login</h3>
                    <form id="login-form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button><br>
                        <p>Not a user? <a href="{{ route('register') }}">Register Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script> 
    <!--  Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>
