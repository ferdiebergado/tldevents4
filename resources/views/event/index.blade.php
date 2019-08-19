@extends('layouts.app')

@section('content')

    <h4 class="card-title">Events
        <span>
            <a class="btn btn-success float-right" href="{{ route('events.create') }}" role="button"><i class="far fa-plus-square"></i> CREATE NEW</a>
        </span>
    </h4>

    {{-- <datatable route="{{ route('api.events.index') }}" link="{{ route('events.index') }}" :headers="[{id: 1, name: 'Title'},{id: 2,name: 'Venue'},{id: 3,name: 'Start Date'},{id: 4,name: 'End Date'}]"></datatable> --}}

    <div class="row py-4">
        <div class="col-12">
            <event-datatable route="{{ route('api.events.index') }}"></event-datatable>
        </div>
    </div>

@endsection
