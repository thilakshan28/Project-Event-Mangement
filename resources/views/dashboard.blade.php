@extends('layouts.admin.master')
@section('title', 'dashboard')
@section('header')
<h4> Welcome {{Auth::user()->name}} </h4>
@endsection
@section('content')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    
@endsection
