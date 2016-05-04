@extends('master', ['title' => 'API keys'])

@section('content')
    <div class="container">
        @if(count($keys) === 0)
            <div class="alert alert-warning">No API keys have been made yet</div>
        @else
            <table class="table table-stiped">
                <thead>
                    <th>Key</th>
                    <th>Name</th>
                    <th>Count</th>
                    <th>Last used</th>
                </thead>
                <tbody>
                @foreach($keys as $key)
                    <tr>
                        <td>{{ $key->key }}</td>
                        <td>{{ $key->name }}</td>
                        <td>{{ $key->count }}</td>
                        <td>{{ $key->updated_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
