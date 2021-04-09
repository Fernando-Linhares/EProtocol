@extends('layouts.app')

@section('content')
<div class="container">
   @foreach ($users as $user)
       {{$user}}
       <br>
   @endforeach
</div>
@endsection
