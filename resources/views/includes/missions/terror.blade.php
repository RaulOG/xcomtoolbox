<h1 class="h1">
    {{ $mission->type->name }}
</h1>

<ul>
    @foreach($mission->aliens as $alien)
        <li><img class="image" src="/images/alien_types/{{$alien->type->name}}.png" alt="{{$alien->type->name}}">{{$alien->type->name}}</li>
    @endforeach
</ul>

@include('includes.pod-create', ['mission' => $mission])
