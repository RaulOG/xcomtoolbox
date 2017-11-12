<!-- old -->
<!--
<form action="/pods" method="post">
    {{--{{ csrf_field() }}--}}
    <button type="submit">Create pod</button>
</form>
-->

<button style="display:block;" type="button" data-toggle="modal" data-target="#pod-create">Create pod</button>

@include('includes.pod-modal')