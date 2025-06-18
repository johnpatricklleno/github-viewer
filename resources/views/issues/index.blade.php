<!-- index.blade.php -->
<h1>Your Open Issues</h1>
<ul>
@foreach($issues as $issue)
    <li>
        <a href="issues/{{ $issue['repository']['owner']['login'] }}/{{ $issue['repository']['name'] }}/{{ $issue['number'] }}">
            #{{ $issue['number'] }} - {{ $issue['title'] }} ({{ \Carbon\Carbon::parse($issue['created_at'])->diffForHumans() }})
        </a>
    </li>
@endforeach
</ul>
