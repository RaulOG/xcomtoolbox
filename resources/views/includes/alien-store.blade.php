<form style="float:left;" method="post" action="{{ route('aliens.store', ['pod_id' => $pod_id]) }}">
    {{ csrf_field() }}
    <button type="submit">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
</form>