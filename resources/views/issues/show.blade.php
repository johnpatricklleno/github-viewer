@extends('layouts.app')

@section('content')
    <a href="{{ route('issues.index') }}" class="btn btn-link mb-3">&larr; Back to issues</a>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">#{{ $issue['number'] }} - {{ $issue['title'] }}</h2>
            <h6 class="card-subtitle text-muted mb-3">
                Created on {{ \Carbon\Carbon::parse($issue['created_at'])->format('M d, Y h:i A') }}
            </h6>
            <p class="card-text">
                {!! nl2br(e($issue['body'] ?? 'No description provided.')) !!}
            </p>
        </div>
    </div>
@endsection
