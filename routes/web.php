<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GithubIssueController  ;

Route::get('/issues', [GithubIssueController::class, 'index'])->name('issues.index');
Route::get('/issues/{owner}/{repo}/{number}', [GithubIssueController::class, 'show'])->name('issues.show');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
