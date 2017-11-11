<div class="dropdown" style="float:left;">
    <button class="dropdown-toggle" style="padding:0px;width:56px;height:56px;" type="button" data-toggle="dropdown">
        @if($alien->type == null)
            <i class="fa fa-user-o" aria-hidden="true" style="font-size: 2em;"></i>
        @else
            <img src="images/alien_types/{{$alien->type->name}}.png" alt="{{$alien->type->name}}" style="width:52px;height:52px;"/>
        @endif
    </button>
    <ul class="dropdown-menu" style="min-width: initial; padding:0px">
        <li>
            {{--<button type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>--}}
            <button type="button" style="height:52px;width:52px;" data-toggle="modal" data-target="#alien-{{$alien->id}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </button>
        </li>
        <li style="width:100%;">
            <form style="width:100%;" action="{{ route('aliens.destroy', ['id' => $alien->id]) }}" method="post">
                {{ method_field('DELETE') }}
                {{csrf_field()}}
                <button  style="height:52px;width:52px;" type="submit">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
            </form>
            {{--<button type="button"><i class="fa fa-trash-o" aria-hidden="true"></i></button>--}}
        </li>
    </ul>
</div>
