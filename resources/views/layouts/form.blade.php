@extends('layouts.app')

@section('content')

<h4 class="card-title">
    {{ ucfirst(session('page_task')) }}
    <span class="btn-toolbar float-right" role="toolbar" aria-label="">
        <span class="btn-group" role="group" aria-label="">
            <a class="btn btn-light" href="{{ route($models.'.index') }}" role="button"><i class="far fa-list-alt"></i>&nbsp;List</a>
            @if (Route::is('*.show'))
                <a class="btn btn-light" href="{{ route($models.'.edit', ['id' => $model->id]) }}" role="button"><i class="far fa-edit"></i>&nbsp;Edit</a>
            @endif
            @if (Route::is('*.edit'))
                <a class="btn btn-light" href="{{ route($models.'.show', ['id' => $model->id]) }}" role="button"><i class="far fa-eye"></i>&nbsp;View</a>
            @endif
        </span>
    </span>
</h4>

<form id="modelform" class="py-4" action="{{ route($models.'.'.$action, ['id' => $model->id]) }}" method="POST">
    @csrf

    @if ($action === 'update')
        @method('PUT')
    @endif

    @isset($model)
        <div class="form-group">
            <label for="">ID</label>
            <span class="badge badge-primary">{{ empty($model->id) ? '(New)':$model->id }}</span>
        </div>
    @endisset

    @yield('formfields')

    @unless (Route::is('*.show'))

    <submit-button icon="fas fa-save" text="SAVE"></submit-button>
    @endunless

</form>

@endsection
