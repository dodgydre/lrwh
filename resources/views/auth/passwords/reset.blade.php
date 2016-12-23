@extends('layouts.app')

@section('title')
  Reset Password
@endsection

@section('content')

<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-half is-offset-one-quarter">
        @if (session('status') )
          <div class="notification is-success">
            <button class="delete"></button>
            {{ session('status') }}
          </div>
        @endif
        <form role="form" method="POST" action="{{url('/password/reset') }}">
          {{ csrf_field() }}
          <input type="hidden" name="token" value="{{ $token }}" />

          <label class="label{{ $errors->has('email') ? ' is-danger' : '' }}" for="email">E-Mail Address</label>
          <p class="control has-icon has-icon-right">
            <input class="input{{ $errors->has('email') ? ' is-danger' : ''}}" name="email" value="{{ $email or old('email') }}" required autofocus />
            @if ($errors->has('email'))
              <i class="fa fa-warning"></i>
              <span class="help is-danger">{{ $errors->first('email') }}</span>
            @endif
          </p>

          <label class="label{{ $errors->has('password') ? ' is-danger' : '' }}" for="password">Password</label>
          <p class="control has-icon has-icon-right">
            <input class="input{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password" required>
            @if ($errors->has('password'))
              <i class="fa fa-warning"></i>
              <span class="help is-danger">{{ $errors->first('password') }}</span>
            @endif
          </p>

          <label class="label{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" for="password_confirmation">Confirm Password</label>
          <p class="control has-icon has-icon-right">
            <input class="input{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" type="password" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
              <i class="fa fa-warning"></i>
              <span class="help is-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
          </p>

          <p class="control">
            <button type="submit" class="button is-primary">Reset Password</button>
          </p>

        </form>

      </div>
    </div>
  </div>
</section>
@endsection
