@extends('master', ['title' => 'Projects'])

@section('header')
    <h1><i class="fa fa-folder-open fa-2x" style="color: white;"  aria-hidden="true"></i></h1>
@stop

@section('content')
    <div class="container">
            @if (count($github_projects) > 0)
                <div class="projects">
                    @foreach($github_projects as $project)
                        <?php
                        $created_at = new \DateTime($project['created_at']);
                        $updated_at = new \DateTime($project['pushed_at']);
                        ?>

                        <div class="project">
                            <div class="project-header">
                                <h3><a href="{{ $project['html_url'] }}" target="_blank"><i class="fa {{ $project['fork'] ? 'fa-code-fork' : 'fa-github' }}"></i> {{ $project['name'] }}</a></h3>
                            </div>

                            <div class="project-body">
                                <table>
                                    <tr>
                                        <td><strong><i class="fa fa-file-code-o"></i> Language</strong></td>
                                        <td>{{ $project['language'] }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong><i class="fa fa-clock-o"></i> Created</strong></td>
                                        <td>{{ $created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong><i class="fa fa-clock-o"></i> Updated</strong></td>
                                        <td>{{ $updated_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                </table>
                                <p>
                                    {{ $project['description'] ?: "No description" }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning">Failed to fetch the repo list from GitHub <i class="fa fa-frown-o fa-2x"></i></div>
            @endif
    </div>
@stop
