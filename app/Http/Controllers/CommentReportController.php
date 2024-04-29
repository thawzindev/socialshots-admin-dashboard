<?php

namespace App\Http\Controllers;

use App\Models\CommentMongoDB;
use App\Models\PostMongoDB;
use App\Models\ReportMongoDB;
use Illuminate\Http\Request;

class CommentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $reports = ReportMongoDB::whereNotNull('commentId')
                            ->with(['comment', 'post', 'user'])
                            ->orderBy('createdAt', 'desc')
                            ->get();

        // return $reports;

        return view('reports.comment', compact('reports'));
    }

    public function action(Request $request)
    {
        // return $request->all();
        $report = ReportMongoDB::where('_id', $request->id)->first();

        $report->update([
            'status' => $request->type,
        ]);

        // return $report;

        if ($request->type === 'ACTION_TAKEN') {
            $post = CommentMongoDB::where('_id', $report->postId)->first();
            $post->update([
                'deletedAdminId'  => auth()->id()
            ]);
        }
                           
        return redirect()->route('comment-reports.index')->with('success', 'Successfully updated the status!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReportMongoDB $reportMongoDB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportMongoDB $reportMongoDB)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReportMongoDB $reportMongoDB)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportMongoDB $reportMongoDB)
    {
        //
    }
}
