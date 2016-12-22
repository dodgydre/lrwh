@extends('layouts.app')

@section('title')
  Login
@endsection

@section('content')


<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-half is-offset-one-quarter">
        <form role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}

          <label class="label" for="email">E-Mail Address</label>
          <p class="control has-icon has-icon-right">
            <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="text" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
              <i class="fa fa-warning"></i>
              <span class="help is-danger">{{ $errors->first('email') }}</span>
            @endif
          </p>

          <label class="label" for="password">Password</label>
          <p class="control has-icon has-icon-right">
            <input class="input{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password" required>
            @if ($errors->has('password'))
              <i class="fa fa-warning"></i>
              <span class="help is-danger">{{ $errors->first('password') }}</span>
            @endif
          </p>

          <p class="control">
            <label class="checkbox" for="remember">
              <input type="checkbox" name="remember">
              Remember me
            </label>
          </p>

          <p class="control">
            <button type="submit" class="button is-primary">Submit</button>
            <a class="button is-info is-outlined" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection
