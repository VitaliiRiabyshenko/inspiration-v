@extends('admin.auth.layouts.login')

@section('head')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('admin_p/auth/login.css') }}">

@endsection

@section('content')
<div class="login-box">
    <div class="login-form">
        <form action="{{ route('adminLoginPost') }}" method="POST">
            @csrf
            <h2 class="text-center">{{ __('Введіть логін та пароль') }}</h2>
            @if(\Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ \Session::get('success') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
            @endif
            {{ \Session::forget('success') }}
            @if(\Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ \Session::get('error') }}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
            @endif       
            
            <div class="form-group">
                <label>
                    <input type="text" name="email" placeholder=" " required="required">
                    <p>Email</p>
                  </label>
                @if ($errors->has('email'))
                    <div class="err-input">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>
    
            <div class="form-group">
                <label>
                    <input type="password" name="password" placeholder=" " required="required">
                    <p>Password</p>
                  
                    <div class="password-icon">
                      <i data-feather="eye"></i>
                      <i data-feather="eye-off"></i>
                    </div>
                  </label>
                @if ($errors->has('password'))
                    <div class="err-input">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Увійти') }}</button>
            </div>      
        </form>
    </div>
</div>

@endsection


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{ asset('admin_p/auth/login.css') }}"></script>
@endsection