@extends('layouts.admin.master')
@section('title','Order List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div >
                    <a href="{{route('order.index')}}" class="float-left btn btn-primary btn-circle"><i class="fas fa-arrow-left"></i></a>
                    <h2 class="float-left ml-2">Meal Details</h2>
                    @if(Auth::user()->role->name == 'Admin')
                    <a href="{{ route('order.change',$order->id)}}" class="float-right btn btn-info btn-icon-split"><span class="text">Change Status</span></a>
                    @endif
                </div>
            </div>
            <div class="card-body">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>{{$order->Name}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Status : {{ $order->status }}</td></tr>
                    <tr><td>Type : {{ $order->type }}</td></tr>
                    <tr><td>Description : {{ $order->description }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
