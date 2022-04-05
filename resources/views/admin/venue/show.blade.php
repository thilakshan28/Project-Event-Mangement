@extends('layouts.admin.master')
@section('title','Venue List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div >
                    <a href="{{route('venue.index')}}" class="float-left btn btn-primary btn-circle"><i class="fas fa-arrow-left"></i></a>
                    <h2 class="float-left ml-2">Venue Details</h2>
                </div>
            </div>
            <div class="card-body">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>{{$venue->name}}</th>
                    </tr>
                </thead>
                <tbody>

                    <tr><td>Amount : {{ $venue->address }}</td></tr>
                    <tr><td>Description : {{ $venue->description }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
