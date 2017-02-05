@extends('auth.index')

@section('forms')


<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
        <label class="">E-Mail Address</label>
        <input  type="email" class="col-lg-12" name="email" value="{{ old('email') }}" required autofocus>

        <label for="password" class="col-md-4 control-label">Password</label>
        <input  type="password" class="col-lg-12" name="password" required>



        <div class="col-lg-12">
          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

        <a class="btn btn-link" href="{{ url('/password/reset') }}">
            Forgot Your Password?
        </a>
</form>

@endsection
