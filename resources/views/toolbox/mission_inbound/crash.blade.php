@extends('layouts.app')

@section('content')
    <div class="toolbox container">
        <h1 class="h1">What is the alien craft?</h1>

        <form action="/missions" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="type" value="crash">
            <div class="toolbox__panel toolbox__panel--triple">
                <button class="button toolbox__button" type="submit" name="aliencraft" value="scout">SCOUT</button>
                <button class="button toolbox__button" type="submit" name="aliencraft" value="fighter">FIGHTER</button>
                <button class="button toolbox__button" type="submit" name="aliencraft" value="raider">RAIDER</button>
            </div>
        </form>
    </div>
@endsection