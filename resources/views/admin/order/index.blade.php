@extends('layouts.admin.master')
@section('title','Order List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h2>Orders</h2>
                </div>
                @if(Auth::user()->role->name =='Customer')
                <div class="float-right">
                    <a  class="btn btn-primary btn-md btn-rounded" href="{{ route('order.create')}}"><i class="mdi mdi-account-plus mdi-18px"></i>Create Order</a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Customer Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            @if( $order->status == 'Approved')
                            <td><span class="badge badge-success">Approved</span></td>
                            @elseif($order->status == 'Pending')
                            <td><span class="badge badge-warning">Pending</span></td>
                            @else
                            <td><span class="badge badge-danger">Rejected</span></td>
                            @endif

                            <td>
                                <a href="{{ route('order.show',$order->id)}}" class="btn btn-info btn-icon-split"><span class="text">Show</span></a>
                                @if(Auth::user()->role->name =='Customer')
                                <a href="{{ route('order.edit',$order->id)}}" class="btn btn-info btn-icon-split"><span class="text">Edit</span></a>
                                <a href="{{ route('order.delete',$order->id)}}" class="btn btn-info btn-icon-split"><span class="text">Delete</span></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pt-2">
                <div class="float-right">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
