@extends('layouts.app')

@section('content')
    <div class="toolbox container">
        <h1 class="h1">Which mission is inbound?</h1>

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