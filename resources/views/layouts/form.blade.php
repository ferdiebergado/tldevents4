@extends('layouts.app')

@section('content')

<h4 class="card-title">
    {{ ucfirst(session('page_task')) }}
    <span class="btn-toolbar float-right" role="toolbar" aria-label="">
        <span class="btn-group" role="group" aria-label="">
            <a class="btn btn-light" href="{{ route('events.index') }}" role="button"><i class="far fa-list-alt"></i> List</a>
        </span>
    </span>
</h4>

@yield('form')

@endsection
