<?php 
namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitHubService
{
    protected $token;

    public function __construct()
    {
        $this->token = env('GITHUB_PERSONAL_TOKEN');
    }

    public function getIssuesAssigned()
    {
        return Http::withToken($this->token)
            ->get('https://api.github.com/issues?filter=assigned&state=open')
            ->json();
    }

    public function getIssueDetail($issueNumber, $repoFullName)
    {
        return Http::withToken($this->token)
            ->get("https://api.github.com/repos/{$repoFullName}/issues/{$issueNumber}")
            ->json();
    }
}