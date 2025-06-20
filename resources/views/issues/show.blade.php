@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <a href="/issues" class="text-blue-500 hover:underline mb-4 block">← Back to Issues</a>

    <h1 class="text-2xl font-bold mb-2">#{{ $issue['number'] }} – {{ $issue['title'] }}</h1>
    <div class="text-sm text-gray-500 mb-4">
        Created: {{ \Carbon\Carbon::parse($issue['created_at'])->toDayDateTimeString() }}
    </div>

    @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('issues.update', [$owner, $repo, $number]) }}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Issue Body</label>
            <textarea name="body" rows="10"
                      class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"
            >{{ $issue['body'] }}</textarea>
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Update Issue
        </button>
    </form>
</div>
@endsection