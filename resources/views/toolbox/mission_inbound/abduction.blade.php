@extends('layouts.app')

@section('content')
    <div class="toolbox container">
        <h1 class="h1">What is the abduction difficulty?</h1>

        <form action="/missions" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="type" value="abduction">
            <div class="toolbox__panel toolbox__panel--double">
                <button type="submit" name="difficulty" value="light" class="button toolbox__button">LIGHT</button>
                <button type="submit" name="difficulty" value="moderate"  class="button toolbox__button">MODERATE</button>
                <button type="submit" name="difficulty" value="heavy"  class="button toolbox__button">HEAVY</button>
                <button type="submit" name="difficulty" value="swarming"  class="button toolbox__button">SWARMING</button>
            </div>
        </form>
    </div>
@endsection