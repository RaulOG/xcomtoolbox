<h1 class="h1">
    {{ $mission->type->name }}
    {{ $mission->difficulty->name }}
</h1>

<ul>
    @foreach($mission->aliens as $alien)
        @if(empty($alien->type))
        <li><i class="fa fa-user-o"></i></li>
        @else
        <li><img class="image" src="/images/alien_types/{{$alien->type->name}}.png" alt="{{$alien->type->name}}">{{$alien->type->name}}</li>
        @endif
    @endforeach
</ul>

@include('includes.pod-create', ['mission' => $mission])
