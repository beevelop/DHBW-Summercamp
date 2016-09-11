@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Benutzer Übersicht</h3>
        </div>
        <div id="dashboard" class="panel-body">
            @include('partials.user-overview')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Optionen</h3>
                </div>
                <div class="panel-body">
                    @foreach($options as $option)
                        @if($option->type === 'boolean')
                            <div class="checkbox">
                                <label class="control-label">
                                    <input type="checkbox" {{ $option->value === '1' ? 'checked' : '' }} data-option-boolean="{{ $option->id }}">
                                    {{ $option->label }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection