<div class="row">
    <div class="col-md-6">
        {!! Form::select('event_id', 'Event')->options($events) !!}
    </div>
    <div class="form-group col-md-6">
        <label for="venue_id">Venue</label>
     <select id="venue_id" name="venue_id" class="form-control">
          <option value="" selected disabled>----Choose Venue-------</option>
           @foreach($venues as $venue)
           <option value="{{$venue->id}}"> {{$venue->name}}</option>
           @endforeach
           </select>
      </div>
</div>
<div class="row">
    <div class="col-md-3">
        {!! Form::date('startdate', 'Start Dtae') !!}
    </div>
    <div class="col-md-3">
        {!! Form::time('starttime', 'Start Time') !!}
    </div>
    <div class="col-md-3">
        {!! Form::date('enddate', 'End Date') !!}
    </div>
    <div class="col-md-3">
        {!! Form::time('endtime', 'End Time') !!}
    </div>
</div>
<div class="row" id="template">
    <div class="form-group col-md-4">
        <label for="meal_ids[]">Meal Plan</label>
        <select  name="meal_ids[]" class="form-control meal-input">
            <option value="">--Choose Your food--</option>
            <optgroup label="Veg"></optgroup>
            @foreach($foods as $i=>$food)
                    @if($food['type'] == 'Veg')
                    <option value="{{ $food['id'] }}">{{ $food['name'] }}</option>
                    @endif
            @endforeach
            <optgroup label="Nonveg"></optgroup>
            @foreach($foods as $food)
                    @if($food['type'] == 'Nonveg')
                    <option value="{{ $food['id'] }}">{{ $food['name'] }}</option>
                    @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Date</label>
        <input type="date" name="dates[]" class="form-control date-input">
    </div>
    <div class="form-group col-md-4">
        <label for="whens[]">For</label>
        <select  name="whens[]" class="form-control when-input">
            <option value="">--Choose Your Meal time--</option>
            <option value="Breakfast">BreakFast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
        </select>
    </div>
</div>
<div  id="form-section" >
<div id="form-container" class="ml-auto mr-3" ></div>
<button class="btn btn-sm btn-success mt-2 mb-2 float-right" id="add-btn">Add meals</button>
<div class="clearfix"></div>
</div>



<div id="form-template" class="d-none">
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="meal_ids[]">Meal Plan</label>
        <select  name="meal_ids[]" class="form-control meal-input">
            <option value="">--Choose Your food--</option>
            <optgroup label="Veg"></optgroup>
            @foreach($foods as $food)
                    @if($food['type'] == 'Veg')
                    <option value="{{ $food['id'] }}">{{ $food['name'] }}</option>
                    @endif
            @endforeach
            <optgroup label="Nonveg"></optgroup>
            @foreach($foods as $food)
                    @if($food['type'] == 'Nonveg')
                    <option value="{{ $food['id'] }}">{{ $food['name'] }}</option>
                    @endif
            @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Date</label>
            <input type="date" name="dates[]" class="form-control date-input">
        </div>
        <div class="form-group col-md-3">
            <label for="whens[]">For</label>
            <select  name="whens[]" class="form-control when-input">
                <option value="">--Choose Your Meal time--</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
            </select>
        </div>
        <div class="form-group col-md-1 pt-4">
            <button class="btn btn-sm btn-danger mt-2 delete-item-btn d-none"><span class="fa fa-trash"></span></button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4" >
        {!! Form::select('facility_id','Facility')->options($facilities)!!}
    </div>
    <div class="form-group col-md-4">
        <label for="park_id"> NearByParking</label>
        <select name="park_id" id="park_id" class="form-control"></select>
      </div>
    <div class="col-md-4">
        {!! Form::select('travel_id', 'Travel')->options($travels)!!}
    </div>
</div>



@section('js')
<script>

  $(document).ready(function () {
    function parkChange(venue,park){
    if(venue){
      $.ajax({
        type:"GET",
        url:"{{ route('get.parking')}}?venue="+venue,
        success:function(res){
        if(res){
          $("#park_id").empty();
          $("#park_id").append('<option value="">----Choose Parking------</option>');
          $.each(res,function(key,value){
              if(park == value.id){
          $("#park_id").append('<option value="'+value.id+'" selected>'+value.parking_name+'</option>');
          }else{
            $("#park_id").append('<option value="'+value.id+'">'+value.parking_name+'</option>');}
          })
        } else {
          $("#park_id").empty();
          $("#park_id").append('<option value="">----Choose Parking------</option>');
        }
        }
      });
    }else{
      $("#park_id").empty();
    }
    }

    $('#venue_id').change(function () {
        var val = this.value;
        parkChange(val);
    });
    var template = $('#template')
        var formTemplate = $('#form-template .form-row');
        var formContainer = $('#form-container');
        var addBtn = $('#add-btn');
        function addNewItem(date,when,food) {
            $('#template').remove();
            var newItem = formTemplate.clone();
            formContainer.find('.delete-item-btn').addClass('d-none');
            newItem.find('.delete-item-btn').removeClass('d-none');
            if(date){
                newItem.find('.date-input').val(date)
            }
            if(when){
                newItem.find('.when-input').val(when)
            }
            if(food){
                newItem.find('.meal-input').val(food)
            }
            formContainer.append(newItem);
        }
        addBtn.click(function (e) {
            e.preventDefault();
            addNewItem();
        });
        formContainer.on('click', '.delete-item-btn', function(e) {
            e.preventDefault();
            $(this).parent().parent().remove();
            formContainer.find('.delete-item-btn').addClass('d-none');
            formContainer.find('.delete-item-btn').last().removeClass('d-none');
        });

        @if(isset($order))
            var values= @json($order);
            setEditValues(values);

            document.getElementById("venue_id").value = "{{$order->venue_id}}";
            parkChange("{{$order->venue_id}}","{{$order->park_id}}");

        @endif

        function setEditValues(values){
            var meals = values.meals;
            if(meals[0] != null){
            $.each(meals, function(key,value ) {
                if(value == null){
                    return false;
                }
                else{addNewItem(meals[key].pivot.date,meals[key].pivot.when,meals[key].pivot.meal_id);}
            })
            }
        }

});
</script>
@endsection


