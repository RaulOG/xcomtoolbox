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

        function alienImage(type){
            if(type == "Unknown"){
                return '<i style="font-size:3rem;" class="fa fa-user-o" aria-hidden="true"></i>';
            }else{
                return '<img class="image" src="/images/alien_types/' + type + '.png" alt="' + type + '">';
            }
        }

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
            typeHTML = alienImage(type);

            console.log("typeHTML: %o", typeHTML);

             return '<div class="alien">' +
                    '<input type="hidden" class="alien_type_input_js" name="alien['+id+'][type]" value="'+type+'">' +
                    '<input type="hidden" class="alien_health_input_js" name="alien['+id+'][health]" value="'+hp+'">' +
                    '<input type="hidden" class="alien_max_health_input_js" name="alien['+id+'][max_health]" value="'+hp+'">' +
                    '<input type="hidden" class="alien_current_health_input_js" name="alien['+id+'][current_health]" value="'+hp+'">' +
                    '<div class="pool">' +
                    '<div class="pool__list">' +
                             hpHTML +
                    '</div>' +
                    '<div class="pool__options">' +
                    '<button type="button" class="button pool__button removePool_js"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>' +
                    '<button type="button" class="button pool__button addPool_js"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>' +
                    '</div>' +
                    '</div>' +
                     '<div class="alien__image">' +
                     typeHTML +
                    '</div>' +










//                    '<div class="ui selection dropdown alien_js">' +
//                    '<input type="hidden" name="alien_types[]">' +
//                    '<i class="dropdown icon"></i>' +
//                    '<div class="text">' +
//                             typeHTML +
//                    '</div>' +
//                    '<div class="menu">' +
//                                alienItems +
//                    '</div>' +
//                    '</div>';
                    '</div>';
        }

        function newHp(){
            return '<img src="/images/hp.png" name="hp" class="pool__life">';
        }

        function newNoHp(){
            return '<img src="/images/nohp.png" name="nohp" class="pool__life">';
        }

        function updateAlien(id){
            console.log('Ajax update to alien ' + id);
            $.ajax({
                url: "/aliens/"+id,
                method: "PUT",
                data: $('#alien-'+id).find('form').serialize()
            });
        }

        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var alien_update_timeouts = [];

            $('.alien_count').dropdown({
                onChange: function (value, text, $selectedItem) {

                    $('.aliens').empty();

                    var alien_health = $('.alien_health').dropdown('get value');
                    if(alien_health == ""){ alien_health = 0;}

                    var alien_dominant = $('.alien_dominant').dropdown('get text');
                    if(alien_dominant == ""){ alien_dominant = "unknown";}

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
//                    $('.alien_js').dropdown('set selected', value);
                    var alien_images = $('#pod-create .alien').find('.alien__image');
                    var alien_type_inputs = $('#pod-create .alien').find('.alien_type_input_js');
                    var alien_health_inputs = $('#pod-create .alien').find('.alien_health_input_js');

                    alien_images.each(function(){
                        $(this).empty();
                        $(this).html(alienImage(text));
                    });

                    alien_type_inputs.each(function(){
                        console.log('this: %o', $(this));
                        console.log('text: %o', text);
                        $(this).val(value);
                    });

//                    alien_health_inputs.each(function(){
//                        $(this).val(text);
//                    });

//                    for(var i = 0; i < $('.alien_count').dropdown('get value'); i++ ){
//                        $('.aliens').append(alienTypeDropdown);
//                    }
                }
            });

            $('.alien_health').dropdown({
                onChange: function(value, text, $selectedItem){
                    var alien_health_inputs = $('#pod-create .alien').find('.alien_health_input_js, .alien_max_health_input_js, .alien_current_health_input_js');

                    $('.aliens').find('.pool .pool__life').remove();
                    for(var i = 0; i < value ; i++){
                        $('.aliens').find('.pool__list').append(newHp());
                    }

                    alien_health_inputs.each(function(){
                        $(this).val(text);
                    });
                    $('.pool').show();
                }
            });

            $(document).on("click", ".damagePool_js", function(){
                var alien = $(this).parents(".alien");
                var alien_pool_list = alien.find(".pool__list");
                var alien_form              = alien.find('form');

                // is current health > 0 ? reduce that one point
                var alien_current_health = alien.find(".alien_current_health_input_js");
                if(parseInt(alien_current_health.val()) > 0){
                    console.log('enters ');
                    alien_current_health.val(parseInt(alien_current_health.val()) - 1);
                    alien_pool_list.children("[name=hp]").first().remove();
                    $(this).parents(".pool").find('.pool__list').append(newNoHp());

                    // if alien has a form, update the alien in the backend
                    if(alien_form.length == 1){
                        var alien_id                = alien.attr("id").split('-')[1];

                        if(alien_update_timeouts[alien_id] != null){
                            window.clearTimeout(alien_update_timeouts[alien_id]);
                        }

                        alien_update_timeouts[alien_id] = window.setTimeout(function(){
                            updateAlien(alien_id);
                        }, 1000);
                    }
                }


            });
//
//            $(document).on("click", ".healPool_js", function(){
//
//            });

            $(document).on("click", ".addPool_js", function(){

                var alien                   = $(this).parents(".alien");
                var alien_max_health        = alien.find(".alien_max_health_input_js");
                var alien_current_health    = alien.find(".alien_current_health_input_js");
                var alien_form              = alien.find('form');

                // add hp visually
                $(this).parents(".pool").find('.pool__list').prepend(newHp());

                // update [max_health && current_health] inputs with 1 more value
                alien_max_health.val(parseInt(alien_max_health.val()) + 1);
                alien_current_health.val(parseInt(alien_current_health.val()) + 1);

                // if alien has a form, update the alien in the backend
                if(alien_form.length == 1){
                    var alien_id                = alien.attr("id").split('-')[1];

                    if(alien_update_timeouts[alien_id] != null){
                        window.clearTimeout(alien_update_timeouts[alien_id]);
                    }

                    alien_update_timeouts[alien_id] = window.setTimeout(function(){
                        updateAlien(alien_id);
                    }, 1000);
                }

                return false;
            });

            $(document).on("click", ".removePool_js", function(){

                var alien                   = $(this).parents(".alien");
                var alien_pool_list         = $(this).parents(".pool").find('.pool__list');
                var alien_max_health        = alien.find(".alien_max_health_input_js");
                var alien_current_health    = alien.find(".alien_current_health_input_js");
                var alien_form              = alien.find('form');
                var alien_health = $(this).parents(".alien").find(".alien_health_input_js");

                // remove 1 alien hp
                if(alien_pool_list.children("[name=hp]").length > 0 || alien_pool_list.children("[name=nohp]").length) {
                    if(alien_pool_list.children("[name=hp]").length > 0){
                        console.log('removing one hp');
                        alien_pool_list.children("[name=hp]").first().remove();

                        console.log('removing 1 max health input value');
                        alien_max_health.val(parseInt(alien_max_health.val()) -1);

                        console.log('removing 1 current health input value');
                        alien_current_health.val(parseInt(alien_current_health.val()) -1);
                    }else if(alien_pool_list.children("[name=nohp]").length > 0){
                        console.log('removing one nohp');
                        alien_pool_list.children("[name=nohp]").first().remove();
                        console.log('removing 1 max health input value');
                        alien_max_health.val(parseInt(alien_max_health.val()) -1);
                    }

                    // if alien has a form, update the alien in the backend
                    if(alien_form.length == 1){
                        var alien_id                = alien.attr("id").split('-')[1];

                        if(alien_update_timeouts[alien_id] != null){
                            window.clearTimeout(alien_update_timeouts[alien_id]);
                        }

                        alien_update_timeouts[alien_id] = window.setTimeout(function(){
                            updateAlien(alien_id);
                        }, 1000);
                    }
                }
//                else if(alien_pool_list.children("[name=hp]").length > 0){
//                    console.log('removing one hp');
//                    alien_pool_list.children("[name=nohp]").first().remove();
//                    console.log('removing 1 max health input value');
//                    alien_max_health.val(parseInt(alien_max_health.val()) -1);
//                    console.log('removing 1 current health input value');
//                    alien_current_health.val(parseInt(alien_current_health.val()) -1);
//                }

                /*
                // remove 1 alien hp
                if(alien_pool_list.children("[name=nohp]").length > 0) {
                    console.log('removing one no hp');
                    alien_pool_list.children("[name=nohp]").first().remove();
                    console.log('removing 1 max health input value');
                    alien_max_health.val(parseInt(alien_max_health.val()) -1);
                }else if(alien_pool_list.children("[name=hp]").length > 0){
                    console.log('removing one hp');
                    alien_pool_list.children("[name=hp]").first().remove();
                    console.log('removing 1 max health input value');
                    alien_max_health.val(parseInt(alien_max_health.val()) -1);
                    console.log('removing 1 current health input value');
                    alien_current_health.val(parseInt(alien_current_health.val()) -1);
                }
                */

                return false;
            });

            $(document).on("click", ".overwatch_js", function(){
//                var alien   = $(this).parents(".alien");
                $(this).parent().toggleClass("alien__overwatch--active");
                return false;
            });
        });
    </script>
@endsection