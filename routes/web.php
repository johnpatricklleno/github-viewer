<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GithubIssueController  ;

Route::get('/issues', [GithubIssueController::class, 'index']);
Route::get('/issues/{owner}/{repo}/{number}', [GithubIssueController::class, 'show']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
