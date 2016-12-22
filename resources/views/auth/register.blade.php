@extends('layouts.app')

@section('title')
  Register
@endsection

@section('content')
  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-half is-offset-one-quarter">
          <form role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <label class="label" for="name">Name</label>
            <p class="control has-icon has-icon-right">
              <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
              @if ($errors->has('name'))
                <i class="fa fa-warning"></i>
                <span class="help is-danger">{{ $errors->first('name') }}</span>
              @endif
            </p>

            <label class="label" for="email">E-Mail Address</label>
            <p class="control has-icon has-icon-right">
              <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="text" name="email" value="{{ old('email') }}" required>
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

            <label class="label" for="password_confirmation">Confirm Password</label>
            <p class="control has-icon has-icon-right">
              <input class="input{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" type="password" name="password_confirmation" required>
              @if ($errors->has('password_confirmation'))
                <i class="fa fa-warning"></i>
                <span class="help is-danger">{{ $errors->first('password_confirmation') }}</span>
              @endif
            </p>

            <p class="control">
              <button type="submit" class="button is-primary">Register</button>
            </p>

          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
