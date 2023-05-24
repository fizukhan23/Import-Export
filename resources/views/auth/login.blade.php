<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container-fluid bg-light">
	<div class="row justify-content-center align-items-center" style="height: 100vh;">
		<div class="col-sm-6 col-md-4">
			<div class="card border-0 shadow-lg">
				<div class="card-header bg-white text-center">
					<h3 class="mb-0">Admin Login</h3>
				</div>
				<div class="card-body">
				 <form action="{{ route('login') }}" method="post">
          @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{ Session::get('fail') }}</div>
          @endif
          @csrf
						<div class="form-group">
							<label for="username">Username:</label>
							<input type="email" class="form-control" id="username" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your username" required>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" required autocomplete="current-password"placeholder="Enter your password" required>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Login</button>
					</form>
				</div>
			
			</div>
		</div>
	</div>
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
