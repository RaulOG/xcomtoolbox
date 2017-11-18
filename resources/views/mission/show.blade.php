
@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.missions.'.$mission->type->name)
    </div>
@endsection