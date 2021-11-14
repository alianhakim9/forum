<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@extends('template/navbar')
@section('content')
    <div class="container">
        <h2>Diskusi Hari ini</h2>
        <i>Anda butuh solusi, orang lain kasi solusi</i>
        <hr>
        <div class="row mt-3">
            <div class="col-md-2">
                <p class="text-muted fw-bold">MENU</p>
                <a href="/" class="nav-link actived ps-2 text-light bg-dark"><i class="bi bi-house"></i> Home</a>
                <a href="#" class="nav-link text-muted ps-1"><i class="bi bi-compass"></i> Explore Topics</a>
                <a href="#" class="nav-link text-muted ps-1"><i class="bi bi-book"></i> My Topics</a>
                <a href="/my-answer" class="nav-link text-muted ps-1"><i class="bi bi-chat-left-text"></i> My Answer</a>
            </div>
            <div class="col-md-6">
                <p class="small"><small> {{ count($questions) }} Topik Pertanyaan</small>
                </p>
                @foreach ($questions as $item)
                    <div class="card shadow p-3 mb-5 bg-body rounded border-0">
                        <div class="row p-2">
                            <div class="col-md-4">
                                <img src=" {{ url('image/view/' . $item->image_src) }}" class="img-thumbnail">
                            </div>
                            <div class="col-md-8">
                                <a href="{{ url('detail/' . $item->id) }}" class="h5 text-decoration-none">
                                    {{ $item->title }}</a>
                                <span class="small d-block">
                                    <small><i class="bi bi-person-circle"></i> {{ $item->user->name }}</small>
                                </span>
                                <p class="small"> <small>tanggal posting : {{ $item->created_at }}</small></p>
                                <span class="small text-muted d-block"> {{ $item->description }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <img src="./img/discuss.png" class="img w-100">
            </div>
        </div>
    </div>
@endsection
