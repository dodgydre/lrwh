@extends('layouts.app')

@section('title')
  Living Rooms Warehouse Inventory
@endsection
@section('subtitle')
  Welcome
@endsection

@section('content')
  <section class="section">
    <div class="container">
      Please <a href="{{ url('login') }}">log in</a> to continue
    </div>
  </section>
@endsection
