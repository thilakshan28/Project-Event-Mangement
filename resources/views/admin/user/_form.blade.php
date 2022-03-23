{!! Form::text('name', 'Name') !!}
{!! Form::text('phone', 'Phone No') !!}
{!! Form::text('email', 'E-Mail')->type('email') !!}
{!! Form::select('role_id', 'Role')->options($roles)!!}
{!! Form::text('password', 'Password')->type('password') !!}
{!! Form::text('password_confirmation', 'Confirm Password')->type('password') !!}


