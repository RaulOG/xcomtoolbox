<div class="modal fade" id="pod-create" tabindex="-1" role="dialog" aria-labelledby="pod-createLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="float:left;" id="pod-createLabel"><i class="fa fa-user-o" aria-hidden="true"></i> Create pod</h3>
            </div>
            <form style="display:inline;" action="{{route('pods.store')}}" method="post">
                {{csrf_field()}}
                @if(isset($mission))
                    <input type="hidden" name="mission" value="{{ $mission->id }}">
                @endif

                <div class="modal-body">
                    <div style="width:50%;display:inline-block;">
                        <h4>Number of aliens</h4>
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
                    </div>
                    <div style="width:50%;display:inline-block;">
                        <h4 class="alien_dominant_title" style="display:none;">Alien dominant</h4>
                        <div class="ui selection dropdown alien_dominant" style="display:none;">
                            <input type="hidden" name="alien_dominant">
                            <div class="text">Unknown</div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                @foreach($alien_types as $alien_type)
                                <div class="item" data-value="{{ $alien_type->id}}">{{ $alien_type->name }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div style="width:50%;display:inline-block;">
                        <h4 class="alien_health_title" style="display:none;">Alien health</h4>
                        <div class="ui selection dropdown alien_health" style="display:none;">
                            <input type="hidden" name="alien_health">
                            <div class="text">?</div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <div class="item" data-value="5">5</div>
                                <div class="item" data-value="10">10</div>
                                <div class="item" data-value="15">15</div>
                                <div class="item" data-value="20">20</div>
                                <div class="item" data-value="25">25</div>
                            </div>
                        </div>
                    </div>
                    <h3 class="aliens_title" style="display: none;">Aliens</h3>
                    <div class="aliens" style="display:none;">
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

//        var alienTypeDropdown = '' +
//                '<h5>Alien</h5>' +
//                '<div class="ui selection dropdown alien_js">' +
//                '<input type="hidden" name="alien_types[]">' +
//                '<i class="dropdown icon"></i>' +
//                '<div class="text">' +
//                '<i class="fa fa-user-o" aria-hidden="true"></i>' +
//                '</div>' +
//                '<div class="menu">' +
//                        alienItems +
//                '</div>' +
//                '</div>';

        function newAlien(id, hp=0, type = "unknown"){
            hp = parseInt(hp);
            var hpHTML = '';
            var typeHTML = '';

            if(hp > 0){
                for(var i = 0; i < hp; i++){
                    hpHTML = hpHTML.concat(newHp());
                }
            }

//            if(type == "unknown"){
//                typeHTML = '<i class="fa fa-user-o" aria-hidden="true"></i>';
//            }else{
//                typeHTML = '<img class="image" src="/images/alien_types/' + type + '.png" alt="' + type + '">';
//            }
            typeHTML = type;

            console.log("typeHTML: %o", typeHTML);

             return '<h5>Alien '+id+'</h5>' +
                    '<div class="pool">' +
                    '<div class="pool__list">' +
                             hpHTML +
                    '</div>' +
                    '<div class="pool__options">' +
                    '<button type="button" class="button pool__button removePool_js"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>' +
                    '<button type="button" class="button pool__button addPool_js"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>' +
                    '</div>' +
                    '</div>' +
                    '<div class="ui selection dropdown alien_js">' +
                    '<input type="hidden" name="alien_types[]">' +
                    '<i class="dropdown icon"></i>' +
                    '<div class="text">' +
                             typeHTML +
                    '</div>' +
                    '<div class="menu">' +
                                alienItems +
                    '</div>' +
                    '</div>';
        }

        function newHp(){
            return '<img src="/images/hp.png" class="pool__life">';
        }

        $(document).ready(function(){

            $('.alien_count').dropdown({
                onChange: function (value, text, $selectedItem) {

                    $('.aliens').empty();

                    var alien_health = $('.alien_health').dropdown('get value');
                    if(alien_health == ""){ alien_health = 0;}

                    var alien_dominant = $('.alien_dominant').dropdown('get text');
                    if(alien_dominant == ""){ alien_dominant = "unknown";}
                    console.log("alien_dominant is %o", alien_dominant);

                    // create aliens
                    for(var i = 1; i <= $('.alien_count').dropdown('get value'); i++ ){
                        $('.aliens').append(newAlien(i, alien_health, alien_dominant));
                    }
                    // initialise alien dropdowns
                    $('.alien_js').dropdown({});

                    // show aliens
                    $('.aliens').show();
                    $('.aliens_title').show();
                    $('.alien_dominant').show();
                    $('.alien_health').show();
                    $('.alien_health_title').show();
                    $('.alien_dominant_title').show();
                    if(alien_health > 0){
                        $('.pool').show();
                    }
                }
            });
            $('.alien_dominant').dropdown({
                onChange: function (value, text, $selectedItem) {
                    $('.alien_js').dropdown('set selected', value);
//                    for(var i = 0; i < $('.alien_count').dropdown('get value'); i++ ){
//                        $('.aliens').append(alienTypeDropdown);
//                    }
                }
            });

            $('.alien_health').dropdown({
                onChange: function(value, text, $selectedItem){
                    $('.aliens').find('.pool .pool__life').remove();
                    for(var i = 0; i < value ; i++){
                        $('.aliens').find('.pool__list').append(newHp());
                    }
                    $('.pool').show();
                }
            });

            $(document).on("click", ".addPool_js", function(){
                $(this).parents(".pool").find(".pool__list").append(newHp());
                return false;
            });

            $(document).on("click", ".removePool_js", function(){
                $(this).parents(".pool").find(".pool__list").children().last('.pool_life').remove();
                return false;
            });
        });
    </script>
@endsection