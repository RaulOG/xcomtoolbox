@extends('layouts.app')

@section('content')
    <div class="toolbox container">
        <h1 class="h1">What is the council mission?</h1>

        <form action="/missions" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="type" value="council">
            <div class="toolbox__panel toolbox__panel--triple">
                <button class="button toolbox__button" type="submit" name="council" value="siterecon">Site Recon</button>
                <button class="button toolbox__button" type="submit" name="council" value="targetextraction">Target Extraction</button>
                <button class="button toolbox__button" type="submit" name="council" value="targetescort">Target Escort</button>
                <button class="button toolbox__button" type="submit" name="council" value="assetrecovery">Asset Recovery</button>
                <button class="button toolbox__button" type="submit" name="council" value="bombdisposal">Bomb Disposal</button>
                <button class="button toolbox__button" type="submit" name="council" value="slingshotprogeny">Slingshot & Progeny</button>
            </div>
        </form>
    </div>
@endsection






