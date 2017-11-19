<div class="panel">
    @if($mission->difficulty->name == 'light')
        <h3 style="float:right;" class="h3 h3--meld">
            <img class="image image--meld" src="/images/meld.png" alt="Meld"> Meld
        </h3>
    @endif
    <h2 class="h2 h2--{{$mission->difficulty->name}}">
        {{ ucwords($mission->difficulty->name)}}
    </h2>
    <h3 class="h3">
        Total aliens: @include('includes.missions.expected_aliens', ['difficulty' => $mission->difficulty])
    </h3>
    <h3 class="h3">
        in: @include('includes.missions.expected_pods', ['difficulty' => $mission->difficulty])
    </h3>
</div>
<h1 class="h1">
    {{ ucwords($mission->type->name) }}
    {{--    {{ $mission->difficulty->name }}--}}
</h1>

@if(!empty($mission->pods))
    @foreach($mission->pods as $pod)
        <div class="pod">
            @foreach($pod->aliens as $alien)
                @if($alien->type == null)
                    <div id="alien-{{$alien->id}}" class="alien alien--unknown">
                        <button id="alien-{{$alien->id}}-actions" class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-question"></i>
                        </button>
                        @include('includes.alien.actions', ['alien' => $alien])
                    </div>
                @else
                    <div id="alien-{{$alien->id}}" class="alien alien--{{$alien->type->name}}">
                        <button id="alien-{{$alien->id}}-actions" class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="image" src="/images/alien_types/{{$alien->type->name}}.png" alt="{{$alien->type->name}}">
                        </button>
                        @include('includes.alien.actions', ['alien' => $alien])
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
@endif

<ul>
    @foreach($mission->aliens as $alien)
        @if(empty($alien->type))
            {{--<li><i class="fa fa-user-o"></i></li>--}}
        @else
            {{--<li><img class="image" src="/images/alien_types/{{$alien->type->name}}.png" alt="{{$alien->type->name}}"></li>--}}
        @endif
    @endforeach
</ul>

<div style="clear: right;"></div>
{{--<div class="panel">--}}
{{--Another panel!--}}
{{--</div>--}}

@include('includes.pod-create', ['mission' => $mission])

