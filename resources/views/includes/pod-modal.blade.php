<div class="modal fade" id="pod-create" tabindex="-1" role="dialog" aria-labelledby="pod-createLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="float:left;" id="pod-createLabel"><i class="fa fa-user-o" aria-hidden="true"></i> Create pod</h5>
            </div>
            <form style="display:inline;" action="{{route('pods.store')}}" method="post">
                {{csrf_field()}}
                @if(isset($mission))
                    <input type="hidden" name="mission" value="{{ $mission->id }}">
                @endif

                <div class="modal-body">
                    <h5>Number of aliens</h5>
                    <div class="ui selection dropdown alien_count">
                        <input type="hidden" name="alien_count">
                        <i class="dropdown icon"></i>
                        <div class="text"></div>
                        <div class="menu">
                            <div class="item" data-value="2">2</div>
                            <div class="item" data-value="3">3</div>
                            <div class="item" data-value="4">4</div>
                            <div class="item" data-value="5">5</div>
                            <div class="item" data-value="6">6</div>
                        </div>
                    </div>
                    <div class="ui selection dropdown alien_dominant" style="display:none;">
                        <input type="hidden" name="alien_dominant">
                        <div class="text">Alien dominant?</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            @foreach($alien_types as $alien_type)
                            <div class="item" data-value="{{ $alien_type->id}}">{{ $alien_type->name }}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="aliens" style="display:none;">
                        <h5>Aliens</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('javascript')
    @parent
    <script type="text/javascript">
        var alienItems = "";

        @foreach($alien_types as $alien_type)
            alienItems = alienItems.concat('<div class="item" data-value="{{ $alien_type->id }}">{{ $alien_type->name }}</div>');
        @endforeach

        var alienTypeDropdown = '' +
                '<div class="ui selection dropdown alien">' +
                '<input type="hidden" name="alien_types[]">' +
                '<i class="dropdown icon"></i>' +
                '<div class="text">' +
                '<i class="fa fa-user-o" aria-hidden="true"></i>' +
                '</div>' +
                '<div class="menu">' +
                        alienItems +
                '</div>' +
                '</div>';

        $(document).ready(function(){
            $('.alien_count').dropdown({
                onChange: function (value, text, $selectedItem) {
                    if($('.aliens').empty()){
                        for(var i = 0; i < $('.alien_count').dropdown('get value'); i++ ){
                            $('.aliens').append(alienTypeDropdown);
                        }
                    }
                    $('.alien').dropdown({});
                    $('.alien_dominant').show();
                    $('.aliens').show();
                }
            });
            $('.alien_dominant').dropdown({
                onChange: function (value, text, $selectedItem) {
                    $('.alien').dropdown('set selected', value);
//                    for(var i = 0; i < $('.alien_count').dropdown('get value'); i++ ){
//                        $('.aliens').append(alienTypeDropdown);
//                    }
                }
            });
        });
    </script>
@endsection