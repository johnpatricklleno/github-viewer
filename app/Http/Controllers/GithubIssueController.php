<?php
namespace App\Http\Controllers;

use App\Services\GitHubService;

class GithubIssueController extends Controller
{
    protected $github;

    public function __construct(GitHubService $github)
    {
        $this->github = $github;
    }

    public function index()
    {
        $issues = $this->github->getIssuesAssigned();
        return view('issues.index', compact('issues'));
    }

    public function show($owner, $repo, $number)
    {
        $repoFullName = "{$owner}/{$repo}";
        $issue = $this->github->getIssueDetail($number, $repoFullName);
        return view('issues.show', compact('issue'));
    }
}
