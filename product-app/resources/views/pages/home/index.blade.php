@extends('layouts.app')

@section('content')

<div class="container-btn">
<a href="{{ route('login') }}">
<button type="button"  class="btn btn-primary btn-lg btn-block">LOGIN</button>
</a>
<a href="{{ route('register') }}">
<button type="button" class="btn btn-secondary btn-lg btn-block">REGISTER</button>
</a>
</div>


@endsection


@push('css')
<style>

    .container-btn{
        margin-top: 5%;
        text-align: center;
        width: 100%;
    }

    .btn{
        margin-top: 50px;
        width: 70%;
        height: 100px;
    }

    </style>

@endpush


