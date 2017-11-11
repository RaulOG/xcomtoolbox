<form style="float:right;" method="post" action="/pods/{{$pod_id}}">
    {{ method_field('DELETE') }}
    {{csrf_field()}}

    <button type="submit">
        <i class="fa fa-trash-o" aria-hidden="true"></i>
    </button>
</form>