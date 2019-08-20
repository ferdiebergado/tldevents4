@extends('layouts.form')

@section('formfields')

    <div class="form-group">
        <label for="title">Title</label>
        <textarea class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title" rows="3" minlength="5" maxlength="255" placeholder="Title of the event" {{ Route::is($models.'.show') ? 'readonly' : '' }} required>{{ old('title', isset($model) ? $model->title : '') }}</textarea>
        @if ($errors->has('title'))
            <small class="help-text text-danger">{{ $errors->first('title') }}</small>
        @endif
    </div>

    <div class="form-group">
        <label for="venue">Venue</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-building"></i></span>
                    </div>
        <input type="text" class="form-control {{ $errors->has('venue') ? 'is-invalid' : '' }}" name="venue" id="venue" aria-describedby="venueHelp" placeholder="The venue of the event" value="{{ old('venue', isset($model) ? $model->venue : '') }}" max="255" {{ Route::is($models.'.show') ? 'readonly' : '' }}>
                </div>
        @if ($errors->has('venue'))
            <small class="help-text text-danger">{{ $errors->first('venue') }}</small>
        @endif
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Start Date</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                <input type="date" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" name="start_date" id="start_date" aria-describedby="helpId" placeholder="Start date" value="{{ old('start_date', isset($model) ? $model->start_date : '') }}" {{ Route::is($models.'.show') ? 'readonly' : '' }} required>
                </div>
                @if ($errors->has('start_date'))
                    <small class="help-text text-danger">{{ $errors->first('start_date') }}</small>
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">End Date</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" name="end_date" id="end_date" aria-describedby="helpId" placeholder="End date" value="{{ old('end_date', isset($model) ? $model->end_date : '') }}" {{ Route::is($models.'.show') ? 'readonly' : '' }} required>
                </div>
                @if ($errors->has('end_date'))
                    <small class="help-text text-danger">{{ $errors->first('end_date') }}</small>
                @endif
            </div>
        </div>
    </div>

@endsection
