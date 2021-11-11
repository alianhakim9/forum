<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@extends('template/navbar')
@section('content')
    <div class="container mb-3">
        <h1>Diskusi Hari ini</h1>
        <i>Anda butuh solusi, orang lain bantu anda kasi solusi</i>
        <hr>
        <div class="row">
            <div class="col-md-6">
                @foreach ($questions as $item)
                    <div class="card mt-3 rounded-0 p-3">
                        <div class="row">
                            <div class="col-md-3">
                                <img src=" {{ url('image/view/' . $item->image_src) }}" class="img-thumbnail">
                            </div>
                            <div class="col-md-8">
                                <h3> {{ $item->title }}</h3>
                                <img src="./img/icons/person.svg" class="me-1"> {{ $item->user->name }}
                                <p> {{ $item->description }}</p>
                                <a href=" {{ url('detail/' . $item->id) }}" class="text-decoration-none">lihat
                                    komentar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-6">
                <img src="./img/discuss.png" class="img w-100">
            </div>
        </div>
    </div>
@endsection
