@extends('layouts.admin.master')
@section('title', 'Parking List')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class = "float-left">
                <h4> Are sure you want to delete this Parking?</h4>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open()->route('parking.destroy',[$parking->id])->method('delete') !!}
            
            <button class="btn btn-danger btn-md float-right"><i class="mdi mdi-delete"></i> Delete </button>
<a href="{{ route('parking.index')}}" class="btn btn-info btn-icon-split"><span class="text">Cancel</span></a>

{!! Form::close() !!}
        </div>
    </div>
</div>
</div>
@endsection

