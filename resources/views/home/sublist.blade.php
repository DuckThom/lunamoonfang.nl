@extends('master', ['title' => 'Subscriptions'])

@section('header')
    <h1><i class="fa fa-pass fa-2x" style="color: white;"  aria-hidden="true"></i></h1>
@stop

@section('content')
    <div class="container subscriptions">
        <div class="column-md-1">
            <div class="alert alert-success">Currently subscribed to {{ $sublist->pageInfo->totalResults }} channels</div>
        </div>

        @foreach($sublist->items as $sub)
            <div class="column-md-2">
                <div class="sub">
                    <img class="sub-image" src="{{ $sub->snippet->thumbnails->default->url }}" alt="{{ $sub->snippet->title }}">
                    <div class="sub-link">
                        <a href="https://youtube.com/channel/{{ $sub->snippet->resourceId->channelId }}" target="_blank">{{ $sub->snippet->title }}</a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="column-sm-2">
            @if (isset($sublist->prevPageToken))
                <a href="/sublist/{{ $sublist->prevPageToken }}" class="button btn-default btn-block">Previous Page</a>
            @endif
        </div>
        <div class="column-sm-2">
            @if (isset($sublist->nextPageToken))
                <a href="/sublist/{{ $sublist->nextPageToken }}" class="button btn-default btn-block">Next Page</a>
            @endif
        </div>
    </div>
@stop
