@extends('master')

@section('header')
    <img src="/assets/image/headers/sublist.jpg" />

    <h1>Subscriptions</h1>
@stop

@section('content')
    <div class="alert alert-success">Showing {{ $sublist->pageInfo->totalResults < $sublist->pageInfo->resultsPerPage ? $sublist->pageInfo->totalResults : $sublist->pageInfo->resultsPerPage }} out of {{ $sublist->pageInfo->totalResults }} channels</div>

    @foreach($sublist->items as $sub)
        <div class="media">
            <div class="media-left">
                <a href="https://youtube.com/channel/{{$sub->snippet->resourceId->channelId}}">
                  <img class="media-object" src="{{$sub->snippet->thumbnails->default->url}}" alt="{{$sub->snippet->title}}">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{$sub->snippet->title}}</h4>
                {!! nl2br($sub->snippet->description) !!}
            </div>
        </div>

        <hr />
    @endforeach

    <div class="row">
        <div class="col-xs-6">
            @if (isset($sublist->prevPageToken))
                <a href="/sublist/{{$sublist->prevPageToken}}" class="btn btn-default btn-block">Previous Page</a>
            @endif
        </div>
        <div class="col-xs-6">
            @if (isset($sublist->nextPageToken))
                <a href="/sublist/{{$sublist->nextPageToken}}" class="btn btn-default btn-block">Next Page</a>
            @endif
        </div>
    </div>
@stop

@section('extraCSS')
    <style>
        .media-body {
            border-left: 2px solid #cecece;
            padding-left: 10px;
        }
    </style>
