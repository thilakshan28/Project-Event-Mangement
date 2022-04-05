@extends('layouts.admin.master')
@section('title','Parking List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div >
                    <a href="{{route('parking.index')}}" class="float-left btn btn-primary btn-circle"><i class="fas fa-arrow-left"></i></a>
                    <h2 class="float-left ml-2">Parking Details</h2>
                </div>
            </div>
            <div class="card-body">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>{{$parking->parking_name}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Size : {{ $parking->size }}</td></tr>
                    <tr><td>Amount : {{ $parking->amount }}</td></tr>
                    <tr><td>Description : {{ $parking->description }}</td></tr>
                    <tr><td>
                    @foreach($venues as $venue)
                        @if(in_array($venue->id,$select))
                            <input type="checkbox" name="nearby[]" value= "{{ $venue->id }}" checked /> {{ $venue->name}}<br>
                        @else
                            <input type="checkbox" name="nearby[]" value= "{{ $venue->id }}"  /> {{ $venue->name}}<br>
                        @endif
                    @endforeach
                    </td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
