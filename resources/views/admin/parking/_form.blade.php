{!! Form::text('parking_name', 'Parking Name') !!}
{!! Form::select('size', 'Size',['Small' => 'Small','Medium' => 'Medium','High' => 'High']) !!}
{!! Form::text('amount', 'Amount') !!}
<h5>Near By  Venues (Must Select One)</h5>
@if(isset($parking))
    @foreach($venues as $venue)
            @if(in_array($venue->id,$select))
                <input type="checkbox" name="nearby[]" value= "{{ $venue->id }}" checked /> {{ $venue->name}}<br>
            @else
                <input type="checkbox" name="nearby[]" value= "{{ $venue->id }}"  /> {{ $venue->name}}<br>
            @endif
    @endforeach
@else
    @foreach($venues as $venue)
        <input type="checkbox" name="nearby[]" value= "{{ $venue->id }}"/> {{ $venue->name}}<br>
    @endforeach
@endif

{!! Form::textarea('description', 'Description') !!}


