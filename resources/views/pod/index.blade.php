@extends('layouts.app')

@section('content')
    @if($pods->count() == 0)
    No pods
    @elseif($pods->count() == 1)
        1 pod
    @else
        {{ $pods->count() }} pods
    @endif

    <br>

    @foreach($pods as $pod)
        <div style="display: inline-block;min-width:228px; height:62px; border: 3px solid #d3e0e9;margin:10px;">
            @foreach($pod->aliens as $alien)
                    <!-- alien image and actions>
                @include('includes.alien-actions', ['alien' => $alien])
                <!-- Modal -->
                @include('includes.alien-modal', ['alien' => $alien])
            @endforeach

            @include('includes.alien-store', ['pod_id' => $pod->id])

            @include('includes.pod-destroy', ['pod_id' => $pod->id])
        </div>
    @endforeach

    <form action="/pods" method="post">
        {{ csrf_field() }}
        <button type="submit">Create pod</button>
    </form>
    <svg width="885px" height="406px">
        <clipPath id="clipPolygon">
            <polygon points="">
            </polygon>
        </clipPath>
    </svg>
    <div style="clip-path: url('#clipPolygon');"></div>
    {{--<div style="width: 500px; height: 500px; border:2px solid #53E1E6; clip-path: polygon(0% 0%, 7% 0%, 7% 2%, 93% 2%, 100% 7%, 100% 98%, 50% 98%, 50% 100%, 5% 100%, 0% 95%)">--}}
        {{--Hey--}}
    {{--</div>--}}

    <div style="width: 500px; height: 500px;">
        Hey
    </div>
@endsection