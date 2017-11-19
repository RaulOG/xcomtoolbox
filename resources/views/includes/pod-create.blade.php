<!-- old -->
<!--
<form action="/pods" method="post">
    {{--{{ csrf_field() }}--}}
    <button type="submit">Create pod</button>
</form>
-->

<button class="button button--addalien" type="button" data-toggle="modal" data-target="#pod-create">
    <img class="image image--alien" src="/images/alien_types/sectoid.png" alt="sectoid">
    <img class="image image--alien" src="/images/alien_types/drone.png" alt="drone">
    <img class="image image--alien" src="/images/alien_types/thinman.png" alt="thinman">
    <img class="image image--alien" src="/images/alien_types/floater.png" alt="floater">
</button>

{{--<button style="display:block;" type="button" data-toggle="modal" data-target="#pod-create">Create pod</button>--}}

@include('includes.pod-modal', ['mission' => isset($mission) ? $mission : null])