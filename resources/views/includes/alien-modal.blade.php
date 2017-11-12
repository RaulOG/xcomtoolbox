<div class="modal fade" id="alien-{{$alien->id}}" tabindex="-1" role="dialog" aria-labelledby="alien-{{$alien->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="float:left;" id="alien-{{$alien->id}}Label"><i class="fa fa-user-o" aria-hidden="true"></i> Enemy</h5>
            </div>
            <form action="{{route('aliens.update', ['id' => $alien->id])}}" method="post">
                {{ method_field('PUT') }}
                {{csrf_field()}}
                <div class="modal-body">
                    Choose alien:
                    <ul style="list-style:none;">
                        {{--<li style="display:inline-block;"><button style="background-color:transparent;outline:none;"><img src="images/alien_types/sectoid.png" alt="sectoid" style="height:100px;"/></button></li>--}}
                        {{--<li style="display:inline-block;"><button style="background-color:transparent;outline:none;"><img src="images/alien_types/drone.jpg" alt="drone" style="height:100px;"/></button></li>--}}
                        {{--<li style="display:inline-block;"><button style="background-color:transparent;outline:none;"><img src="images/alien_types/floater.png" alt="floater" style="height:100px;"/></button></li>--}}
                        {{--<li style="display:inline-block;"><button style="background-color:transparent;outline:none;"><img src="images/alien_types/thinman.png" alt="thinman" style="height:100px;"/></button></li>--}}
                        <li style="display:inline-block;"><label><input type="radio" name="alien_type" value="sectoid" style="background-color:transparent;outline:none;"><img src="images/alien_types/sectoid.png" alt="sectoid" style="height:100px;"/></label></li>
                        <li style="display:inline-block;"><label><input type="radio" name="alien_type" value="drone" style="background-color:transparent;outline:none;"><img src="images/alien_types/drone.png" alt="drone" style="height:100px;"/></label></li>
                        <li style="display:inline-block;"><label><input type="radio" name="alien_type" value="floater" style="background-color:transparent;outline:none;"><img src="images/alien_types/floater.png" alt="floater" style="height:100px;"/></label></li>
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