<?php
namespace App\Http\Controllers;

use App\Services\GitHubService;
use Illuminate\Http\Request;

class GithubIssueController extends Controller
{
    protected $github;

    public function __construct(GitHubService $github)
    {
        $this->github = $github;
    }

    public function index()
    {
        $issues = $this->github->getIssuesNotNoFix();
    echo var_dump($issues); die();
        return view('issues.index', compact('issues'));
    }

    public function show($owner, $repo, $number)
    {
        $repoFullName = "{$owner}/{$repo}";
        $issue = $this->github->getIssueDetail($number, $repoFullName);
       return view('issues.show', compact('issue', 'owner', 'repo', 'number'));
    }
    public function updateBody($owner, $repo, $number, Request $request)
    {
        $this->github->updateIssueBody($owner, $repo, $number, $request->body);
        return redirect()->back()->with('status', 'Issue updated successfully!');
    }
}
