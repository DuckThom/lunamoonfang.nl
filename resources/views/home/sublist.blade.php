@extends('master')

@section('title')
        Subscription list
@stop

@section('content')
    <?php //dd($sublist); ?>
    <div class="alert alert-success">Showing {{ $sublist->pageInfo->totalResults < $sublist->pageInfo->resultsPerPage ? $sublist->pageInfo->totalResults : $sublist->pageInfo->resultsPerPage }} out of {{ $sublist->pageInfo->totalResults }} channels</div>

    @foreach($sublist->items as $sub)
        <div class="well">
            <img src="{{$sub->snippet->thumbnails->default->url}}">
            <a href="https://youtube.com/channel/{{$sub->snippet->resourceId->channelId}}">{{$sub->snippet->title}}</a>
        </div>
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
