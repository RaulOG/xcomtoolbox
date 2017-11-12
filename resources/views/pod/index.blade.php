@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h1">Welcome to the Pod generator tool</h1>
        @if($pods->count() == 0)
            <h3 class="h3">Currently, there are no pods.</h3>
        @elseif($pods->count() == 1)
            <h3 class="h3">1 pod</h3>
        @else
            <h3 class="h3">{{ $pods->count() }} pods</h3>
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
    </div>
@endsection