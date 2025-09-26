<!-- Modern Login UI - Bootstrap 5 Version -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizza Shop - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #1c1a19, #efdcdc);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }
    .auth-card {
      max-width: 420px;
      width: 100%;
      padding: 2.5rem;
      box-shadow: 0 0 15px rgba(0,0,0,0.15);
      border-radius: 1rem;
      background: white;
    }
    .social-btn {
      display: flex;
      gap: 1rem;
      justify-content: center;
      margin: 1rem 0;
    }
    .social-btn a {
      text-decoration: none;
      flex: 1;
      padding: 0.5rem;
      text-align: center;
      border-radius: 0.5rem;
      color: white;
    }
    .google-btn { background: #db4437; }
    .github-btn { background: #333; }
    .extra-links {
      display: flex;
      justify-content: space-between;
      font-size: 0.9rem;
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <div class="auth-card">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <h3 class="mb-4 text-center">Welcome Back 👋</h3>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  required>
        @error('email')
          <small class="invalid-feedback">{{ $message }}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  required>
        @error('password')
        <small class="invalid-feedback">{{ $message }}</small>
      @enderror
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>

      {{-- <div class="social-btn">
        <a href="{{ url('auth/google/redirect') }}" class="google-btn">
            <i class="bi bi-google"></i> Login with Google
        </a>
        <a href="{{ url('auth/github/redirect') }}" class="github-btn">
            <i class="bi bi-github"></i> Login with GitHub
        </a>
    </div> --}}


      <div class="extra-links">
        <a href="">Forgot Password?</a>
        <a href="{{ route('userRegister') }}">Create Account</a>
      </div>
    </form>
  </div>
</body>
</html>
