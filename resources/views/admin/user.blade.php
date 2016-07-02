@extends('layouts.admin')

@section('title', $user->exists ? 'Benutzer bearbeiten' : 'Neuer Benutzer')

@section('content')
    <a href="/admin/users" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
        Benutzer Übersicht
    </a>

    <hr>

    @if($user->exists)
        <h1>{{ $user->name() }}</h1>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form method="POST" action="/admin/user">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label class="control-label" for="first_name">Vorname</label>
                    <input id="first_name" name="first_name" type="text" class="form-control" placeholder="Vorname" required value="{{ $user->first_name }}">
                    <span class="help-block">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label class="control-label" for="last_name">Nachname</label>
                    <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Nachname" required value="{{ $user->last_name }}">
                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                </div>

                <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
                    <label for="age">Alter</label>
                    <input id="age" name="age" type="number" class="form-control" placeholder="Alter" required min="1" max="99" value="{{ $user->age }}">
                    <span class="help-block">{{ $errors->first('age') }}</span>
                </div>

                <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                    <label for="gender">Geschlecht</label>
                    <select id="gender" name="gender" class="form-control">
                        <option></option>
                        <option value="1" {{ $user->gender === 1 ? 'selected' : '' }}>Weiblich</option>
                        <option value="0" {{ $user->gender === 0 ? 'selected' : '' }}>Männlich</option>
                    </select>
                    <span class="help-block">{{ $errors->first('gender') }}</span>
                </div>
                @if($user->exists)
                    <input type="hidden" name="editing" value="true"/>
                    <input type="hidden" name="id" value="{{ $user->id }}"/>
                @endif

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i>
                    Speichern
                </button>
            </form>
        </div>
    </div>
@endsection