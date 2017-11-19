@extends('layouts.app')

@section('content')
    <div class="toolbox container">
        <h1 class="h1">Overview</h1>

        <h3 class="h3">
            Missions
        </h3>
        <ul>
            @foreach($missions as $mission)
                <li style="font-size:16px;color:white;list-style-type: none;">Mission {{$mission->id}} - Pod count: {{$mission->pods->count()}}, Alien count: {{$mission->aliens->count()}}</li>
            @endforeach
        </ul>
        <form action="/missions" method="post">
            {{ csrf_field() }}
            <div class="toolbox__panel toolbox__panel--triple">
                <button class="button toolbox__button" type="button" data-value="mission-inbound/abduction">ABDUCTION SITE</button>
                <button class="button toolbox__button" type="button" data-value="mission-inbound/crash">CRASH SITE</button>
                <button class="button toolbox__button" type="button" data-value="mission-inbound/landing">LANDING SITE</button>
                <button class="button toolbox__button" type="submit" name="type" value="terror">TERROR SITE</button>
                <button class="button toolbox__button" type="button" data-value="mission-inbound/council">COUNCIL MISSION</button>

                {{--<button class="button toolbox__command">--}}
                {{--BASE ASSAULT--}}
                {{--</button>--}}
                {{--<button class="button toolbox__command">--}}
                {{--BASE DEFENSE--}}
                {{--</button>--}}
            </div>
        </form>
    </div>
@endsection