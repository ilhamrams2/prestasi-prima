<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import model dengan namespace yang benar
use App\Models\prestasiprima\News;
use App\Models\prestasiprima\Kegiatan;
use App\Models\prestasiprima\Prestasi; // <== perbaiki namespace
use App\Models\prestasiprima\Staff;
use App\Models\prestasiprima\ContactMessage;
use App\Models\prestasiprima\Visitor;
use App\Models\prestasiprima\ActivityLog;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Stats Cards
        $totalBerita = News::count();
        $totalKegiatan = Kegiatan::count();
        $totalPrestasi = Prestasi::count();
        $totalStaff = Staff::count();
        $unreadMessages = ContactMessage::unread()->count();
        $visitorsToday = Visitor::today()->count();
        $visitorsMonth = Visitor::thisMonth()->count();

        // Data for Chart (Last 7 Days)
        $chartDates = [];
        $chartVisitors = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $chartDates[] = now()->subDays($i)->format('d M');
            $chartVisitors[] = Visitor::where('visit_date', $date)->count();
        }

        // Latest Data
        $latestNews = News::latest()->take(5)->get();
        $latestPrestasi = Prestasi::latest()->take(5)->get();
        $latestMessages = ContactMessage::latest()->take(3)->get();
        $latestActivities = ActivityLog::latest()->take(6)->get();
        
        // Server Health (System Monitor)
        $diskFree = disk_free_space("/") / (1024 * 1024 * 1024); // GB
        $diskTotal = disk_total_space("/") / (1024 * 1024 * 1024); // GB
        $diskUsedPercent = round((($diskTotal - $diskFree) / $diskTotal) * 100, 1);
        
        // RAM monitoring (Basic PHP check)
        $memoryUsage = memory_get_usage(true) / (1024 * 1024); // MB
        $memoryLimit = ini_get('memory_limit');
        
        $serverHealth = [
            'disk_percent' => $diskUsedPercent,
            'disk_free' => round($diskFree, 1),
            'memory_usage' => round($memoryUsage, 1),
            'php_version' => PHP_VERSION,
        ];

        return view('prestasiprima.admin.dashboard', compact(
            'totalBerita',
            'totalKegiatan',
            'totalPrestasi',
            'totalStaff',
            'unreadMessages',
            'visitorsToday',
            'visitorsMonth',
            'chartDates',
            'chartVisitors',
            'latestNews',
            'latestPrestasi',
            'latestMessages',
            'latestActivities',
            'serverHealth'
        ));
    }
}
