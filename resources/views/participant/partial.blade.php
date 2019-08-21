@extends('layouts.form')

@section('formfields')

<div class="form-row">
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" {{ Route::is($models.'.show') ? 'readonly' : '' }} name="lastname" id="firstname" aria-describedby="firstnameHelp" placeholder="Last Name" value="{{ old('lastname', isset($model) ? $model->lastname : '') }}" max="255" required>
        @if ($errors->has('lastname'))
        <small class="help-text text-danger">{{ $errors->first('lastname') }}</small>
        @endif
    </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-4">

    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" {{ Route::is($models.'.show') ? 'readonly' : '' }} name="firstname" id="firstname" aria-describedby="firstnameHelp" placeholder="First Name" value="{{ old('firstname', isset($model) ? $model->firstname : '') }}" max="255" required>
        @if ($errors->has('firstname'))
        <small class="help-text text-danger">{{ $errors->first('firstname') }}</small>
        @endif
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-2">

        <div class="form-group">
        <label for="mi">M.I.</label>
        <input type="text" class="form-control {{ $errors->has('mi') ? 'is-invalid' : '' }}" {{ Route::is($models.'.show') ? 'readonly' : '' }} name="mi" id="mi" aria-describedby="miHelp" placeholder="Middle Initial" value="{{ old('mi', isset($model) ? $model->mi : '') }}" max="255">
        @if ($errors->has('mi'))
        <small class="help-text text-danger">{{ $errors->first('mi') }}</small>
        @endif
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2">
        <div class="form-group">
      <label for="sex">Sex</label>
      <select class="form-control {{ $errors->has('sex') ? 'is-invalid' : '' }}" name="sex" id="sex" {{ Route::is($models.'.show') ? 'readonly' : '' }}>
          <option value="">Please select...</option>
        <option value="M" {{ !empty(old('sex')) && old('sex') === 'M' ? 'selected': '' }} {{ !empty($model) && $model->sex === 'M' ? 'selected' : ''}}>Male</option>
        <option value="F" {{ !empty(old('sex')) && old('sex') === 'F' ? 'selected': '' }} {{ !empty($model) && $model->sex === 'F' ? 'selected' : ''}}>Female</option>
    </select>
    @if ($errors->has('sex'))
    <small class="help-text text-danger">{{ $errors->first('sex') }}</small>
    @endif
</div>
</div>
</div>

<station-select route="{{ route('api.regions.index') }}" divroute="{{ route('api.divisions.index') }}" perpage="50"></station-select>

<div class="form-row">

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                </div>
            <input type="text" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" {{ Route::is($models.'.show') ? 'readonly' : '' }} name="mobile" id="mobile" aria-describedby="mobileHelp" placeholder="Mobile phone no." value="{{ old('mobile', isset($model) ? $model->mobile : '') }}" max="255" required>
            </div>
            @if ($errors->has('mobile'))
            <small class="help-text text-danger">{{ $errors->first('mobile') }}</small>
            @endif
        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">

        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-envelope"></i></span>
                </div>
                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" {{ Route::is($models.'.show') ? 'readonly' : '' }} name="email" id="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email', isset($model) ? $model->email : '') }}" max="255">
            </div>
            @if ($errors->has('email'))
            <small class="help-text text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>
    </div>

</div>

<div class="form-row">
    <div class="col">
        @unless (Route::is('*.create'))

        <p>Events Attended</p>

        @if ($model->events)

        <table class="table table-sm table-responsive">
            <thead class="thead-light">
                <tr>
                    <th width="10%">ID</th>
                    <th width="40%">Title</th>
                    <th width="20%">Venue</th>
                    <th width="15%">Start Date</th>
                    <th width="15%">End Date</th>
                    {{-- <th>Mobile</th>
                    <th>Email</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($model->events as $e)

                <tr>
                    <td scope="row">{{ $e->id }}</td>
                    <td>{{ $e->title }}</td>
                    <td>{{ $e->venue }}</td>
                    <td>{{ $e->start_date }}</td>
                    <td>{{ $e->end_date }}</td>
                    {{-- <td>{{ $e->pivot->mobile }}</td>
                    <td>{{ $e->pivot->email }}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif

        @endunless

        @if (Route::is('*.edit') || Route::is('*.create'))

        <div class="form-group">
          <label for="event">Add Event</label>
          <select class="form-control {{ $errors->has('event') ? 'is-invalid' : '' }}" name="event" id="event" required>
              <option value="">Select an event...</option>
              @forelse ($with as $w)
              <option value="{{ $w->id }}" {{ !empty(old('event')) && old('event') === $w->id ? 'selected': '' }}><small>{{ $w->title }}</small></option>
              @empty
                  {{ __('messages.empty') }}
              @endforelse
          </select>
            @if ($errors->has('event'))
            <small class="help-text text-danger">{{ $errors->first('event') }}</small>
            @endif
        </div>

        @endif
    </div>
</div>
@endsection
