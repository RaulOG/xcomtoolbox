
@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.missions.'.$mission->type->name)

        @if ($mission->state == 'open')
        <form action="{{ route('missions.update', $mission->id ) }}" method="POST">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <button type="submit" class="button">Close</button>
        </form>
        @else
            <label>Mission closed</label>
        @endif
    </div>
@endsection
