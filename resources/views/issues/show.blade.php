<a href="/issues">← Back to list</a>

<h2>#{{ $issue['number'] }} - {{ $issue['title'] }}</h2>
<p><strong>Created:</strong> {{ \Carbon\Carbon::parse($issue['created_at'])->toDayDateTimeString() }}</p>

<div>
    {!! nl2br(e($issue['body'])) !!}
</div>
