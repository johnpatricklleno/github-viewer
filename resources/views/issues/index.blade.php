@extends('layouts.app')

@section('content')
    @if (count($issues))
        <ul class="list-group">
            @foreach ($issues as $issue)
                <li class="list-group-item">
                    <h5>
                        <a href="{{ route('issues.show', [
                            'owner' => $issue['repository']['owner']['login'],
                            'repo' => $issue['repository']['name'],
                            'number' => $issue['number']
                        ]) }}" class="text-decoration-none text-primary">
                            #{{ $issue['number'] }} - {{ $issue['title'] }}
                        </a>
                    </h5>
                    <small class="text-muted">
                        Created on {{ \Carbon\Carbon::parse($issue['created_at'])->format('M d, Y') }}
                    </small>
                </li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-info">No open issues assigned to you.</div>
    @endif
@endsection
