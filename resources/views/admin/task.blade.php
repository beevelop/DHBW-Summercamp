@extends('layouts.admin')

@section('title', $new ? 'Neue Aufgabe' : 'Aufgabe bearbeiten')

@section('content')
    <a href="/admin/levels" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
        Level Übersicht
    </a>

    <hr>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form method="POST" action="/admin/task">
                {{ csrf_field() }}

                @if(!$new)
                    <input id="id" name="id" type="hidden" value="{{ $task->id }}">
                @endif

                <div class="form-group {{ $errors->has('level_id') ? 'has-error' : '' }}">
                    <label for="level_id">Level</label>
                    <select id="level_id" name="level_id" class="form-control" required>
                        <option></option>
                        @foreach($levels as $level)
                            <option value="{{ $level->id }}" {{ $level->id === $task->level_id ? 'selected' : '' }}>{{ $level->title }}</option>
                        @endforeach
                    </select>
                    <span class="help-block">{{ $errors->first('level_id') }}</span>
                </div>

                <div class="form-group {{ $errors->has('difficulty') ? 'has-error' : '' }}">
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="difficulty" id="difficulty_easy" value="1"
                                   required {{ $task->difficulty === 1 ? 'checked' : '' }}>
                            Einfach
                        </label>
                    </div>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="difficulty" id="difficulty_medium"
                                   value="2" {{ $task->difficulty === 2 ? 'checked' : '' }}>
                            Mittel
                        </label>
                    </div>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="difficulty" id="difficulty_hard"
                                   value="3" {{ $task->difficulty === 3 ? 'checked' : '' }}>
                            Schwierig
                        </label>
                    </div>
                    <span class="help-block">{{ $errors->first('difficulty') }}</span>
                </div>

                <div class="form-group {{ $errors->has('difficulty') ? 'has-error' : '' }}">
                    <label for="content" class="control-label">Inhalt</label>
                    <textarea id="content" name="content" class="form-control" placeholder="Inhalt"
                              required>{{ $task->content }}</textarea>
                    <span class="help-block">{{ $errors->first('content') }}</span>
                </div>

                <div class="form-group {{ $errors->has('youtube_url') ? 'has-error' : '' }}">
                    <label class="control-label" for="youtube_url">YouTube URL</label>
                    <input id="youtube_url" name="youtube_url" type="text" class="form-control"
                           placeholder="YouTube URL"
                           value="{{ $task->youtube_url }}">
                    <span class="help-block">{{ $errors->first('youtube_url') }}</span>
                </div>

                <div class="form-group {{ $errors->has('pdf_url') ? 'has-error' : '' }}">
                    <label class="control-label" for="pdf_url">PDF URL</label>
                    <input id="pdf_url" name="pdf_url" type="text" class="form-control" placeholder="PDF URL"
                           value="{{ $task->pdf_url }}">
                    <span class="help-block">{{ $errors->first('pdf_url') }}</span>
                </div>

                <div class="form-group {{ $errors->has('finish_type') ? 'has-error' : '' }}">
                    <label class="control-label">Abgabe</label>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="finish_type" id="self" value="{{ App\Enums\FinishType::SELF }}"
                                   required {{ $task->finish_type === App\Enums\FinishType::SELF ? 'checked' : '' }}>
                            Selbstprüfung
                        </label>
                    </div>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="finish_type" id="multiple-choice"
                                   value="{{ App\Enums\FinishType::MULTIPLE_CHOICE }}" {{ $task->finish_type === App\Enums\FinishType::MULTIPLE_CHOICE ? 'checked' : '' }}>
                            Multiple Choice
                        </label>
                    </div>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="finish_type" id="teacher"
                                   value="{{ App\Enums\FinishType::TEACHER }}" {{ $task->finish_type === App\Enums\FinishType::TEACHER ? 'checked' : '' }}>
                            Lehrer
                        </label>
                    </div>
                    <span class="help-block">{{ $errors->first('finish_type') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i>
                    Speichern
                </button>

                <button type="button" class="btn btn-danger pull-right" data-delete="{{ $task->id }}"
                        data-model="task"
                        data-redirect="/admin/levels" {{ $new ? 'disabled' : '' }}>
                    <i class="fa fa-trash"></i>
                    Löschen
                </button>
            </form>
        </div>
        @if($task->finish_type === App\Enums\FinishType::MULTIPLE_CHOICE)
            <div class="col-xs-12 col-sm-6">
                <h3>Multiple Choice</h3>
            </div>
        @endif
    </div>
@endsection