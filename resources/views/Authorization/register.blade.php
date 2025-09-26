<!-- Modern Register UI - Bootstrap 5 Version -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizza Shop - Register</title>
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
      max-width: 460px;
      width: 100%;
      padding: 2.5rem;
      box-shadow: 0 0 15px rgba(0,0,0,0.15);
      border-radius: 1rem;
      background: white;
    }
    .extra-links {
      display: flex;
      justify-content: flex-end;
      font-size: 0.9rem;
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <div class="auth-card">
    <h3 class="mb-4 text-center">Create Your Account 🍕</h3>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" >
        @error('name')
          <small class="invalid-feedback">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label ">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" >
        @error('email')
          <small class="invalid-feedback">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label ">Phone Number</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" >
        @error('phone')
          <small class="invalid-feedback">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label ">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >
        @error('password')
          <small class="invalid-feedback">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password_confirmation" class="form-label ">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" >
        @error('password_confirmation')
          <small class="invalid-feedback">{{ $message }}</small>
        @enderror
      </div>

      <button type="submit" class="btn btn-success w-100">Create Account</button>

      <div class="extra-links">
        <a href="{{ route('userLogin') }}">Already have an account?</a>
      </div>
    </form>
  </div>
</body>
</html>
