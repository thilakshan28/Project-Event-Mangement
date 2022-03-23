@extends('layouts.admin.master')
@section('title','Food List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if(Auth::user()->role->name == 'Admin')
                <div class="float-left">
                    <h2>Add Food</h2>
                </div>
                @if(Auth::user()->role->name == 'Admin')
            </div>
            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-warning">
                    {{ session('error') }}
                </div>
                @endif
                {!! Form::open()->route('food.store')->method('post') !!}
                @include('admin.food._form')
                <div class="row">
                    <div class="col-12">
                        <div class="float-right">
                        <button class="btn btn-success btn-md"><i class="mdi mdi-floppy"></i>Create</button>
                        <a class="btn btn-dark btn-md" href="{{ route('food.index') }}"><i class="mdi mdi-cancel"></i>Cancel</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

