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

@forelse($mission->pods as $pod)
    <div class="pod">
        @foreach($pod->aliens as $alien)
            @if($alien->type == null)
                <div id="alien-{{$alien->id}}" class="alien alien--unknown">
                    <input type="hidden" class="alien_current_type_input_js" name="alien-{{$alien->id}}-type" value="Unknown">
                    <input type="hidden" class="alien_max_health_input_js" name="alien-{{$alien->id}}-max_health" value="{{$alien->max_health}}">
                    <input type="hidden" class="alien_current_health_input_js" name="alien-{{$alien->id}}-current_health" value="{{$alien->current_health}}">
                    <div class="pool pool--show">
                        <div class="pool__list">
                            @for($i = 0; $i < $alien->current_health; $i++)
                                <img src="/images/hp.png" class="pool__life">
                            @endfor
                            @for($i = 0; $i < $alien->max_health - $alien->current_health; $i++)
                                <img src="/images/nohp.png" class="pool__life">
                            @endfor
                        </div>
                        <div class="pool__options">
                        <button type="button" class="button pool__button removePool_js"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                        <button type="button" class="button pool__button addPool_js"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="alien__image">
                        <i class="fa fa-question"></i>
                    </div>
                    {{--<button id="alien-{{$alien->id}}-actions" class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--<i class="fa fa-question"></i>--}}
                    {{--</button>--}}
{{--                        @include('includes.alien.actions', ['alien' => $alien])--}}
                </div>
            @else
                <div id="alien-{{$alien->id}}" class="alien alien--{{$alien->type->name}}">
                    <form action="">
                        <input type="hidden" class="alien_type_input_js" name="type" value="{{$alien->type->name}}">
                        <input type="hidden" class="alien_max_health_input_js" name="max_health" value="{{$alien->max_health}}">
                        <input type="hidden" class="alien_current_health_input_js" name="current_health" value="{{$alien->current_health}}">
                        <div class="pool pool--show">
                            <div class="pool__list">
                                @for($i = 0; $i < $alien->current_health; $i++)
                                    <img src="/images/hp.png" name="hp" class="pool__life">
                                @endfor
                                @for($i = 0; $i < $alien->max_health - $alien->current_health; $i++)
                                    <img src="/images/nohp.png" name="nohp" class="pool__life">
                                @endfor
                            </div>
                            <div class="pool__options">
                                <button type="button" class="button pool__button removePool_js">
                                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="button pool__button addPool_js">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="button pool__button damagePool_js">
                                    <span style="color: red;" class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
                                </button>
                                <button type="button" class="button pool__button kill_js">
                                    <span style="color: red;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                        <div class="alien__image">
                            <img class="image" src="/images/alien_types/{{$alien->type->name}}.png" alt="{{$alien->type->name}}">
                            <div class="alien__overwatch">
                                {{--<button class="button overwatch_js">--}}
                                <button class="overwatch_js">
                                    <img style="height: 32px;" src="/images/overwatch.jpg" alt="overwatch">
                                </button>
                            </div>
                        </div>
                    </form>
                    {{--<button id="alien-{{$alien->id}}-actions" class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--<img class="image" src="/images/alien_types/{{$alien->type->name}}.png" alt="{{$alien->type->name}}">--}}
                    {{--</button>--}}
{{--                        @include('includes.alien.actions', ['alien' => $alien])--}}
                </div>
            @endif
        @endforeach
    </div>
@empty
    <div class="h3 h3--meld">No pods that we are aware of. Proceed with caution.</div>
@endforelse

<div style="clear: right;"></div>
{{--<div class="panel">--}}
{{--Another panel!--}}
{{--</div>--}}

@include('includes.pod-create', ['mission' => $mission])

