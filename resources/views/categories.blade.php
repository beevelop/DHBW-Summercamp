@extends('layouts.app')

@section('title', 'Kategorien')

@section('content')
    <div class="centered-logo">
        <object class="logoobject" data="img/svg/logo.svg" type="image/svg+xml"></object>
    </div>

    <div class="container landing-container">
        <hr/>
        <div class="col-xs-12 sc-panel scratch-panel">
            <div class="row">
                <div class="col-xs-12 content-top-border-12"></div>
            </div>
            <div class="row">
                <div class="col-xs-12 content">
                    @include('includes.breadcrumbs')

                    <h2 style="font-size: 1.8rem;">Hey {{ Auth::user()->first_name }}, du bist auf Platz {{ Auth::user()->getRank() }}!</h2>
                    <a href="/ranking" class="btn btn-default btn-lg hvr-pulse-grow" style="margin-bottom: 15px;"><i class="fa fa-bar-chart-o"></i> | Rangliste</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-bottom-border-12"></div>
            </div>
        </div>
        @foreach($categories as $index => $category)
            @if($category->active)
                <div class="col-xs-5 @if($index >= 1) col-xs-offset-2 @endif sc-panel scratch-panel">
                    <div class="row">
                        <div class="col-xs-12 content-top-border-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 content">
                            <h2>{{ $category->name }}</h2>
                            <a href="/category/{{ $category->id }}"><img src="{{ $category->image_url }}" width="222px"
                                             class="img-responsive center-block hvr-grow sc-start-image"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 content-bottom-border-6"></div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection