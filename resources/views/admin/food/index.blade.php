@extends('layouts.admin.master')
@section('title','Food List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h2>Foods</h2>
                </div>
                @if(Auth::user()->role->name == 'Admin')
                <div class="float-right">
                <a  class="btn btn-primary btn-md btn-rounded" href="{{ route('food.create')}}"><i class="mdi mdi-account-plus mdi-18px"></i>Add foods</a>
                </div>
                @endif
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form class="float-right d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        {!! Form::text('q','',request()->input('q'))->placeholder('Search Foods....') !!}
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </br>
                </form>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Type (Veg/Nonveg)</th>
                        <th>Amount per unit</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                        <tr>
                            <td>{{ $food->id }}</td>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->type }}</td>
                            <td>{{ $food->amount }}</td>
                            <td>

                                <a href="{{ route('food.edit',$food->id)}}" class="btn btn-info btn-icon-split"><span class="text">Edit</span></a>
                                <a href="{{ route('food.delete',$food->id)}}" class="btn btn-info btn-icon-split"><span class="text">Delete</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pt-2">
                <div class="float-right">
                    {{ $foods->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
