@extends('layouts.app')

@section('title')
  Send Password Reset Link
@endsection

<!-- Main Content -->
@section('content')
  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-half is-offset-one-quarter">
          @if (session('status'))
            <div class="notification is-success">
              <button class="delete"></button>
              {{ session('status') }}
            </div>
          @endif

          <form role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            <label class="label{{ $errors->has('email') ? ' is-danger' : '' }}" for="email">E-Mail Address</label>
            <p class="control has-icon has-icon-right">
              <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="text" name="email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
                <i class="fa fa-warning"></i>
                <span class="help is-danger">{{ $errors->first('email') }}</span>
              @endif
            </p>

            <p class="control">
              <button type="submit" class="button is-primary">Send Password Reset Link</button>
            </p>
          </form>

        </div>
      </div>

    </div>
  </section>

@endsection
