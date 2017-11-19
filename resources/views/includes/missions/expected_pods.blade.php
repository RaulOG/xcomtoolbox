@if($difficulty->min_pod_count == $difficulty->max_pod_count)
    {{ $difficulty->min_pod_count  }}
@else
    {{ $difficulty->min_pod_count }}
    -
    {{ $difficulty->max_pod_count }}
@endif
pods