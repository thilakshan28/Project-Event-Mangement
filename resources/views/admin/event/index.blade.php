@extends('layouts.admin.master')
@section('title','Event List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h2>Events</h2>
                </div>

                @if(Auth::user()->role->name == 'Admin')
                <div class="float-right">
                <a  class="btn btn-primary btn-md btn-rounded" href="{{ route('event.create')}}"><i class="mdi mdi-account-plus mdi-18px"></i>Create Events</a>
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
                        {!! Form::text('q','',request()->input('q'))->placeholder('Search Events....') !!}
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
                        <th>Event Id</th>
                        <th>Event Type</th>
                        <th>Amount</th>
                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->event_type }}</td>
                            <td>{{ $event->amount }}</td>
                            @if(Auth::user()->role->name == 'Admin')
                            <td>
                                <a href="{{ route('event.show',$event->id)}}" class="btn btn-info btn-icon-split"><span class="text">Show</span></a>
                                <a href="{{ route('event.edit',$event->id)}}" class="btn btn-info btn-icon-split"><span class="text">Edit</span></a>
                                <a href="{{ route('event.delete',$event->id)}}" class="btn btn-info btn-icon-split"><span class="text">Delete</span></a>
                            </td>
                            @else
                            <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example-{{$event->id}}" >Book</button>
                            <div class="modal fade" id="example-{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Conformation</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        {!! Form::open()->route('event.add',[$event->id])->method('post') !!}
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <h2>Are You Ready To Book?</h2>
                                            {!! Form::date('date','Date',request()->input('date'))->required() !!}
                                            {!! Form::time('time','Time',request()->input('time'))->required() !!}

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <button value="submit" class="btn btn-primary">Ok</button>
                                        </div>
                                        {!! Form::close() !!}
                                      </div>
                                    </div>
                                  </div>

                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pt-2">
                <div class="float-right">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
