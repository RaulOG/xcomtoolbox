@extends('layouts.app')

@section('content')
    <div class="toolbox container">
        <h1 class="toolbox__header h1">Welcome to the Toolbox, central officer.</h1>

        <div class="toolbox__panel toolbox__panel--double">
            <button class="button toolbox__button">OVERVIEW</button>
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