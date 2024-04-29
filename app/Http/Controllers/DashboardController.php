<?php

namespace App\Http\Controllers;

use App\Models\PostMongoDB;
use App\Models\ReportMongoDB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts_count = PostMongoDB::count();
        $reported_posts_count = ReportMongoDB::whereNotNull('postId')->whereNull('commentId')->count();
        $reported_comments_count = ReportMongoDB::whereNotNull('postId')->whereNotNull('commentId')->count();
    
        return view('dashboard', compact('posts_count', 'reported_posts_count', 'reported_comments_count'));
    }
}
