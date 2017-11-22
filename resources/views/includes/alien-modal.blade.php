<div class="modal fade" id="alien-{{$alien->id}}-edit" tabindex="-1" role="dialog" aria-labelledby="alien-{{$alien->id}}-editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{--<h5 class="modal-title" style="float:left;" id="alien-{{$alien->id}}-editLabel"><i class="fa fa-user-o" aria-hidden="true"></i> Enemy</h5>--}}
                <h3 class="modal-title">Choose alien:</h3>
            </div>
            <form action="{{route('aliens.update', ['id' => $alien->id])}}" method="post">
                {{ method_field('PUT') }}
                {{csrf_field()}}
                @if(isset($mission) && !empty($mission))
                    <input type="hidden" name="mission" value="{{$mission->id}}">
                @endif
                <div class="modal-body">
                    <ul style="list-style:none;">
                        {{--<li style="display:inline-block;"><button style="background-color:transparent;outline:none;"><img src="images/alien_types/sectoid.png" alt="sectoid" style="height:100px;"/></button></li>--}}
                        {{--<li style="display:inline-block;"><button style="background-color:transparent;outline:none;"><img src="images/alien_types/drone.jpg" alt="drone" style="height:100px;"/></button></li>--}}
                        {{--<li style="display:inline-block;"><button style="background-color:transparent;outline:none;"><img src="images/alien_types/floater.png" alt="floater" style="height:100px;"/></button></li>--}}
                        {{--<li style="display:inline-block;"><button style="background-color:transparent;outline:none;"><img src="images/alien_types/thinman.png" alt="thinman" style="height:100px;"/></button></li>--}}
                        @foreach($alien_types as $alien_type)
                            <li style="display:inline-block;">
                                <input id="alien-{{$alien->id}}-{{$alien_type->name}}" type="radio" name="alien_type" value="{{$alien_type->name}}" style="display: none; background-color:transparent;outline:none;"@if($alien->type != null && $alien->type->name == $alien_type->name) checked @endif>
                                <label for="alien-{{$alien->id}}-{{$alien_type->name}}" style="cursor: pointer;">
                                    <img src="/images/alien_types/{{$alien_type->name}}.png" alt="{{$alien_type->name}}" style="height:100px;"/>
                                </label>
                            </li>
                        @endforeach

                        {{--<li style="display:inline-block;">--}}
                            {{--<input id="alien-{{$alien->id}}-sectoid" type="radio" name="alien_type" value="sectoid" style="display: none; background-color:transparent;outline:none;"@if($alien->type != 'null' && $alien->type->name == 'sectoid') checked @endif>--}}
                            {{--<label for="alien-{{$alien->id}}-sectoid" style="cursor: pointer;">--}}
                                {{--<img src="/images/alien_types/sectoid.png" alt="sectoid" style="height:100px;"/>--}}
                            {{--</label>--}}
                        {{--</li>--}}
                        {{--<li style="display:inline-block;">--}}
                            {{--<input id="alien-{{$alien->id}}-drone" type="radio" name="alien_type" value="drone" style="display: none; background-color:transparent;outline:none;"@if($alien->type != 'null' && $alien->type->name == 'drone') checked @endif>--}}
                            {{--<label for="alien-{{$alien->id}}-drone" style="cursor: pointer;">--}}
                                {{--<img src="/images/alien_types/drone.png" alt="drone" style="height:100px;"/>--}}
                            {{--</label>--}}
                        {{--</li>--}}
                        {{--<li style="display:inline-block;">--}}
                            {{--<input id="alien-{{$alien->id}}-floater" type="radio" name="alien_type" value="floater" style="display: none; background-color:transparent;outline:none;"@if($alien->type != 'null' && $alien->type->name == 'floater') checked @endif>--}}
                            {{--<label for="alien-{{$alien->id}}-floater" style="cursor: pointer;">--}}
                                {{--<img src="/images/alien_types/floater.png" alt="floater" style="height:100px;"/>--}}
                            {{--</label>--}}
                        {{--</li>--}}
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>