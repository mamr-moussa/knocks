@extends('layouts.main')
@section('content')
<div class = "container">
<knocksinput 
gid = "first_name"
v-model = "first_name"
placeholder = "First Name"
icon = "knocks-user"
:is_required = "true"></knocksinput>

<knocksinput 
gid = "last_name"
v-model = "last_name"
placeholder = "Last Name"
icon = "knocks-user"
:is_required = "true"></knocksinput>

<knocksinput 
gid = "username"
v-model = "username"
placeholder = "Username"
icon = "knocks-user"
:is_required = "true"></knocksinput>

<knocksdatepicker 
id = "birthdate"
v-model = "birthdate"
placeholder = "Birthdate"
icon = "knocks-user"
:max	="{ day : 0 , month : 2 , year : -15  , calc : false  }"
:min="{ day : 0 , month : 2 , year : -105  , calc : false }"
></knocksdatepicker>


</div>



@endsection