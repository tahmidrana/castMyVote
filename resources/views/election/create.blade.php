@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        @include('inc.message')
        <div class="card">
            <div class="card-header">{{ __('Create New Election') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('election.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="4">{{ old('username') }}</textarea>
                            
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="start_datetime" class="col-md-4 col-form-label text-md-right">{{ __('Start Date Time') }}</label>

                        <div class="col-md-6">
                            <input id="start_datetime" type="datetime-local" class="form-control{{ $errors->has('start_datetime') ? ' is-invalid' : '' }}" name="start_datetime" value="{{ old('start_datetime') }}" required>

                            @if ($errors->has('start_datetime'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('start_datetime') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="end_datetime" class="col-md-4 col-form-label text-md-right">{{ __('End Date Time') }}</label>

                        <div class="col-md-6">
                            <input id="end_datetime" type="datetime-local" class="form-control{{ $errors->has('end_datetime') ? ' is-invalid' : '' }}" name="end_datetime" value="{{ old('end_datetime') }}" required>

                            @if ($errors->has('end_datetime'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('end_datetime') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>                    

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
