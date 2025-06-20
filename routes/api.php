<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GithubIssueController;

Route::get('/issues', [GithubIssueController::class, 'index'])->name('issues.index');
Route::get('/issues/{owner}/{repo}/{number}', [GithubIssueController::class, 'show'])->name('issues.show');
Route::patch('/issues/{owner}/{repo}/{number}', [GithubIssueController::class, 'updateBody'])->name('issues.update');