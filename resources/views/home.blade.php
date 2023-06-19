@extends('layouts.app')

@section('content')
<div class="section-header">
    <h1>Halaman Utama</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="hero bg-white text-dark text-center">
                <div class="hero-inner">
                    <h2 class="mb-3">Halo, Selamat Datang, {{ Auth::user()->name }}!</h2>
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="250">
                    <h2 class="mt-3">Lavinavera</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection