<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\ActivityLog;

class AdminLogController extends Controller
{
    /**
     * Display a listing of activity logs.
     */
    public function index(Request $request)
    {
        $query = ActivityLog::latest();

        // Filter by user
        if ($request->has('user') && $request->user) {
            $query->where('user_name', 'like', '%' . $request->user . '%');
        }

        // Filter by action
        if ($request->has('action') && $request->action) {
            $query->where('action', $request->action);
        }

        // Filter by date
        if ($request->has('date_start') && $request->date_start) {
            $query->whereDate('created_at', '>=', $request->date_start);
        }
        if ($request->has('date_end') && $request->date_end) {
            $query->whereDate('created_at', '<=', $request->date_end);
        }

        $logs = $query->paginate(50)->withQueryString();

        return view('prestasiprima.admin.logs.index', compact('logs'));
    }

    /**
     * Display the specified activity log.
     */
    public function show($id)
    {
        $log = ActivityLog::findOrFail($id);
        return view('prestasiprima.admin.logs.show', compact('log'));
    }

    /**
     * Remove all old logs (maintenance).
     */
    public function clear(Request $request)
    {
        $days = $request->input('days', 30);
        ActivityLog::where('created_at', '<', now()->subDays($days))->delete();

        ActivityLog::log('system', "Cleared activity logs older than $days days");

        return back()->with('success', "Logs older than $days days have been cleared.");
    }
}
