@extends('layouts.app')

@section('title', 'Login - Sisfo Decode')

@section('styles')
<style>
    .auth-page {
        min-height: calc(100vh - 160px);
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
    }
    
    .auth-page::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: moveBackground 20s linear infinite;
    }
    
    @keyframes moveBackground {
        0% {
            transform: translate(0, 0);
        }
        100% {
            transform: translate(50px, 50px);
        }
    }
    
    .auth-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        max-width: 450px;
        width: 100%;
        position: relative;
        z-index: 1;
        animation: fadeInUp 0.6s ease;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .auth-header {
        background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        padding: 40px 30px;
        text-align: center;
        color: white;
    }
    
    .auth-header h2 {
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 10px;
    }
    
    .auth-header p {
        margin: 0;
        opacity: 0.9;
        font-size: 1rem;
    }
    
    .auth-body {
        padding: 40px 30px;
    }
    
    .form-floating {
        margin-bottom: 20px;
    }
    
    .form-control {
        border: 2px solid #E5E7EB;
        border-radius: 10px;
        padding: 12px 16px;
        transition: all 0.3s ease;
        height: 56px;
    }
    
    .form-control:focus {
        border-color: #4F46E5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
    }
    
    .form-floating label {
        padding: 16px;
        color: #6B7280;
    }
    
    .btn-login {
        background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        border: none;
        border-radius: 10px;
        padding: 14px;
        font-weight: 600;
        font-size: 1.1rem;
        color: white;
        width: 100%;
        transition: all 0.3s ease;
        margin-top: 10px;
    }
    
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(79, 70, 229, 0.4);
    }
    
    .auth-footer {
        text-align: center;
        padding: 20px 30px 30px;
        background: #F9FAFB;
    }
    
    .auth-footer a {
        color: #4F46E5;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .auth-footer a:hover {
        color: #7C3AED;
        text-decoration: underline;
    }
    
    .checkbox-wrapper {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .checkbox-wrapper input[type="checkbox"] {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        cursor: pointer;
        accent-color: #4F46E5;
    }
    
    .checkbox-wrapper label {
        margin: 0;
        cursor: pointer;
        user-select: none;
    }
    
    .icon-wrapper {
        font-size: 3rem;
        margin-bottom: 15px;
    }
</style>
@endsection

@section('content')
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-header">
            <div class="icon-wrapper">
                <i class="bi bi-person-circle"></i>
            </div>
            <h2>Selamat Datang!</h2>
            <p>Masuk ke akun Anda</p>
        </div>
        
        <div class="auth-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-floating">
                    <input type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="email" 
                           name="email" 
                           placeholder="Email"
                           value="{{ old('email') }}"
                           required 
                           autofocus>
                    <label for="email">
                        <i class="bi bi-envelope me-2"></i>Email
                    </label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-floating">
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" 
                           name="password" 
                           placeholder="Password"
                           required>
                    <label for="password">
                        <i class="bi bi-lock me-2"></i>Password
                    </label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="checkbox-wrapper">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Ingat saya</label>
                </div>
                
                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                </button>
            </form>
        </div>
        
        <div class="auth-footer">
            <p class="mb-0">
                Belum punya akun? 
                <a href="{{ route('register') }}">Daftar sekarang</a>
            </p>
        </div>
    </div>
</div>
@endsection
