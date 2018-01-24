@extends('layouts.app')

@section('content')
    <div class="toolbox container">
        <h1 class="h1">Overview</h1>

        <h3 class="h3">
            Missions
        </h3>
        <ul>
            @foreach($missions as $mission)
                <li style="font-size:16px;color:white;list-style-type: none;">
                    <a href="{{ route('missions.show', $mission->id) }}">Mission {{$mission->id}}</a> -Pod count: {{$mission->pods->count()}}, Alien count: {{$mission->aliens->count()}}
                    <label>{{ $mission->state }}</label>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
