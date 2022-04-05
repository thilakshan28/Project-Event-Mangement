@extends('layouts.admin.master')
@section('title','Travel List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h2>Travel</h2>
                </div>
                @if(Auth::user()->role->name == 'Admin')
                <div class="float-right">
                <a  class="btn btn-primary btn-md btn-rounded" href="{{ route('travel.create')}}"><i class="mdi mdi-account-plus mdi-18px"></i>Create Travel</a>
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
                        {!! Form::text('q','',request()->input('q'))->placeholder('Search Travel....') !!}
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
                        <th>Vehicle Name</th>
                        <th>Vehicle Number</th>
                        <th>Travelable passengers</th>
                        <th>Amount </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($travels as $travel)
                        <tr>
                            <td>{{ $travel->vehicle_type }}</td>
                            <td>{{ $travel->vehicle_number }}</td>
                            <td>{{ $travel->peoples }}</td>
                            <td>{{ $travel->amount }}</td>
                            <td>
                                <a href="{{ route('travel.edit',$travel->id)}}" class="btn btn-info btn-icon-split"><span class="text">Edit</span></a>
                                <a href="{{ route('travel.delete',$travel->id)}}" class="btn btn-info btn-icon-split"><span class="text">Delete</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pt-2">
                <div class="float-right">
                    {{ $travels->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
