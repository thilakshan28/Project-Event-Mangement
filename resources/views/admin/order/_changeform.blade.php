{!! Form::select('status', 'Status',['Approved' => 'Approved','Pending' => 'Pending','Rejected' => 'Rejected']) !!}
{!! Form::select('manager_id', 'Manger')->options($managers) !!}
