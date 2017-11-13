@extends('layouts.app')

@section('content')
    <div class="toolbox container">
        <h1 class="toolbox__header h1">Welcome to the Toolbox, central officer.</h1>

        <div class="toolbox__panel toolbox__panel--double">
            <button class="button toolbox__command">OVERVIEW</button>
            <button class="button toolbox__command" data-value="mission-inbound">MISSION INBOUND</button>
            <button class="button toolbox__command">AIR ENGAGEMENT</button>
            <button class="button toolbox__command">SCIENCE PLAN</button>
            <button class="button toolbox__command">CONSTRUCTION OPTIMIZER</button>
            <button class="button toolbox__command">DOCUMENTATION</button>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script type="text/javascript">

    </script>
@endsection