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

    public function getIssuesAssigned($label = "")
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

    public function getIssuesNotNoFix()
    {
        $allNonNoFixedIssues = [];
        $issues =  Http::withToken($this->token)
            ->get('https://api.github.com/issues?filter=assigned&state=open')
            ->json();
        foreach($issues as $issue){
            $labels = $issue["labels"];
            $bool = array_filter($labels, function ($label) {
                return $label["name"] == "wontfix";                
            });
            if(count($bool) == 0){
                array_push($allNonNoFixedIssues, $issue);
            }
        }
        return $allNonNoFixedIssues;
    }
    public function updateIssueBody($issueNumber, $repoFullName, $body){
        $response = Http::withToken($this->token)
        ->patch("https://api.github.com/repos/{$repoFullName}/issues/{$issueNumber}", [
            "body"=>$body
        ]);
        if ($response->successful()) {
            return $response->json();
        }
    }

    

}