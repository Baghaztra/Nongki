@extends('admin.layouts.main')

@section('title', 'Users')

@section('scriptpages')
    <script src="/js/users.js"></script>
@endsection

@section('content')
<div class="card shadow mt-3">
    <div class="card-header d-flex justify-content-between">
        <h1 class="h2">
            Selamat {{ date('H')>=5&&date('H')<12?'pagi':(date('H')>=12&&date('H')<18?'siang':'malam') }}, {{-- Auth::user()->name --}}!
        </h1>
    </div>
    <div class="card-body">
        
    </div>
</div>
@endsection