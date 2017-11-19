@extends('layouts.app')

@section('content')
    <div class="toolbox container">
        <h1 class="toolbox__header h1">Welcome to the Toolbox, central officer.</h1>

        {{--abduction--}}
            {{--light--}}
            {{--moderate--}}
            {{--heavy--}}
            {{--swarming--}}
        {{--crash--}}
            {{--scout--}}
            {{--fighter--}}
            {{--raider--}}
        {{--landing--}}
            {{--scout--}}
            {{--fighter--}}
            {{--raider--}}
        {{--terror--}}
        {{--council--}}
            {{--siterecon--}}
            {{--targetextraction--}}
            {{--targetescort--}}
            {{--assetrecovery--}}
            {{--bombdisposal--}}
            {{--slingshotprogeny--}}

        {{--abduction--}}
        <form action="/missions" method="post">
            {{csrf_field()}}
            <input type="hidden" name="type" value="abduction">
            {{--light--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="difficulty" value="light">Abduction Light</button>
            {{--moderate--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="difficulty" value="moderate">Abduction Moderate</button>
            {{--heavy--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="difficulty" value="heavy">Abduction Heavy</button>
            {{--swarming--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="difficulty" value="swarming">Abduction Swarming</button>
        </form>
        {{--crash--}}
        <form action="/missions" method="post">
            <input type="hidden" name="type" value="crash">
            {{csrf_field()}}
            {{--scout--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="ufo" value="scout">crash scout</button>
            {{--fighter--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="ufo" value="fighter">crash fighter</button>
            {{--raider--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="ufo" value="raider">crash raider</button>
        </form>
        {{--landing--}}
        <form action="/missions" method="post">
            <input type="hidden" name="type" value="landing">
            {{csrf_field()}}
            {{--scout--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="ufo" value="scout">landing scout</button>
            {{--fighter--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="ufo" value="fighter">landing fighter</button>
            {{--raider--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="ufo" value="raider">landing raider</button>
        </form>
        {{--terror--}}
        <form action="/missions" method="post">
            <input type="hidden" name="type" value="terror">
            {{csrf_field()}}
        </form>
        {{--council--}}
        <form action="/missions" method="post">
            {{csrf_field()}}
            <input type="hidden" name="type" value="council">
            {{--siterecon--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="council_mission" value="siterecon">siterecon council</button>
            {{--targetextraction--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="council_mission" value="targetextraction">targetextraction council</button>
            {{--targetescort--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="council_mission" value="targetescort">targetescort council</button>
            {{--assetrecovery--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="council_mission" value="assetrecovery">assetrecovery council</button>
            {{--bombdisposal--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="council_mission" value="bombdisposal">bombdisposal council</button>
            {{--slingshotprogeny--}}
            <button style="width:170px;height:30px;font-size:14px;" type="submit" name="council_mission" value="slingshotprogeny">slingshotprogeny council</button>
        </form>

        <div class="toolbox__panel toolbox__panel--double">
            <button class="button toolbox__button" data-value="overview">OVERVIEW</button>
            <button class="button toolbox__button" data-value="mission-inbound">MISSION INBOUND</button>
            <button class="button toolbox__button">AIR ENGAGEMENT</button>
            <button class="button toolbox__button">SCIENCE PLAN</button>
            <button class="button toolbox__button">CONSTRUCTION OPTIMIZER</button>
            <button class="button toolbox__button">DOCUMENTATION</button>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script type="text/javascript">

    </script>
@endsection