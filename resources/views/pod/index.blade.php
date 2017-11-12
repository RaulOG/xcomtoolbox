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
                    <!-- alien image and actions -->
            @include('includes.alien-actions', ['alien' => $alien])
                    <!-- Modal -->
            @include('includes.alien-modal', ['alien' => $alien])
            @endforeach

            @include('includes.alien-store', ['pod_id' => $pod->id])

            @include('includes.pod-destroy', ['pod_id' => $pod->id])
        </div>
    @endforeach

    @include('includes.pod-create')
@endsection