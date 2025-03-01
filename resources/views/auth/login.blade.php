@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}" id = "login-form">
    {{ csrf_field() }}

    <label for="login">E-mail or Username</label>
    <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus>
    @if ($errors->has('login'))
        <span class="error">
          {{ $errors->first('login') }}
        </span>
    @endif

    <label for="password" >Password</label>
    <input id="password" type="password" name="password" required>
    @if ($errors->has('password'))
        <span class="error">
            {{ $errors->first('password') }}
        </span>
    @endif

    <label>
    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
    <a href="{{ route('password.request') }}" class="recover-password">Recover Password</a>
    </label>


    <button type="submit">
        Login
    </button>
    <a class="button button-outline" href="{{ route('register') }}">Register</a>
    @if (session('success'))
        <p class="success">
            {{ session('success') }}
        </p>
    @endif
</form>
@endsection