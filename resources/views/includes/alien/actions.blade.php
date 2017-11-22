<ul class="dropdown-menu" role="menu" aria-labelledby="alien-{{$alien->id}}-actions">
    <li role="presentation"><a role="menuitem" href="#">Kill</a></li>
    {{--<li role="presentation"><button data-toggle="modal" data-target="#alien-{{$alien->id}}-edit" href="#">Edit</button></li>--}}
    <li role="presentation"><a data-toggle="modal" data-target="#alien-{{$alien->id}}-edit" role="menuitem" href="#">Edit</a></li>
    <li role="presentation">
        <form id="alien-{{$alien->id}}-destroy" style="width:100%;" action="{{ route('aliens.destroy', ['id' => $alien->id]) }}" method="post">
            <input type="hidden" name="mission" value="{{$alien->mission->id}}">
            {{ method_field('DELETE') }}
            {{csrf_field()}}
        </form>
        <a role="menuitem" onclick="document.getElementById('alien-{{$alien->id}}-destroy').submit()" href="#">Delete</a>
    </li>
</ul>

@include('includes.alien-modal', ['alien' => $alien, 'mission' => $mission])