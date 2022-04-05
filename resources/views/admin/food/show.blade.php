@extends('layouts.admin.master')
@section('title','Event List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div >
                    <a href="{{route('food.index')}}" class="float-left btn btn-primary btn-circle"><i class="fas fa-arrow-left"></i></a>
                    <h2 class="float-left ml-2">Meal Details</h2>
                </div>
            </div>
            <div class="card-body">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>{{$food->Name}}</th>
                    </tr>
                </thead>
                <tbody>

                    <tr><td>Type : {{ $food->type }}</td></tr>
                    <tr><td>Description : {{ $food->description }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
