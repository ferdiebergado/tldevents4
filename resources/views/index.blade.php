@extends('layouts.app')

@section('content')

    <h4 class="card-title">
        {{ ucfirst($model) }}
        <span>
            <a class="btn btn-success float-right" href="{{ route($model.'.create') }}" role="button"><i class="far fa-plus-square"></i>&nbsp;<strong>CREATE NEW</strong></a>
        </span>
    </h4>

    <div class="row py-4">
        <div class="col-12">
            <{{$model}}-datatable route="{{ route('api.'.$model.'.index') }}"></{{$model}}-datatable>
        </div>
    </div>

@endsection
