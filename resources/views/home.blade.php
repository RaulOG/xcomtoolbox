@extends('layouts.app')

@section('content')
    <div class="homepage container">
        <h1 class="h1">Welcome to the Toolbox, central officer.</h1>

        <div class="toolbox">
            <button class="button button--toolbox">
                OVERVIEW
            </button>
            <button class="button button--toolbox mission_inbound">
                MISSION INBOUND
            </button>
            <button class="button button--toolbox">
                AIR ENGAGEMENT
            </button>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script type="text/javascript">
        $('.mission_inbound').click(function(){
            $('.homepage').fadeOut(400, function(){
                location.href = "/toolbox/mission-assistance";
            });
        });
    </script>
@endsection