@extends('template/navbar')
@section('content')
    <div class="container">
        <h1>{{ $user[0]->name }}</h1>
        <p>{{ $user[0]->email }}</p>
        <hr>
    </div>
@endsection
