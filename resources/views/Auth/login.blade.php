@extends('layouts.app')
@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="text-center mb-4">
                <i class="bi bi-person-circle" style="font-size: 3rem; color: #2575fc;"></i>
                <h1 class="display-4 fw-bold text-primary">Welcome Back!</h1>
                <p class="text-muted">Please login to your account</p>
            </div>
            <div class="card shadow-lg border-0 rounded-4" style="background: #fff;">
                <div class="card-body p-5">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus>
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%); border: none; box-shadow: 0 4px 14px rgba(37,117,252,0.15); transition: background 0.3s;">Sign In</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3 bg-white border-0 rounded-bottom-4">
                    <div class="small">
                        Don't have an account? <a href="{{ route('register') }}" class="text-primary fw-bold">Register here!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        border-radius: 1rem;
    }
    .form-floating > .form-control {
        padding: 1rem 0.75rem;
    }
    .form-floating > label {
        padding: 1rem 0.75rem;
    }
    .btn-primary {
        padding: 0.8rem;
        font-weight: 500;
    }
    .card-footer {
        background-color: transparent;
        border-top: 1px solid rgba(0,0,0,.125);
    }
    .text-primary {
        color: #0d6efd !important;
    }
    .display-4 {
        font-size: 2.5rem;
    }
    @media (min-width: 768px) {
        .display-4 {
            font-size: 3.5rem;
        }
    }
</style>
@endpush
@endsection