<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\prestasiprima\ActivityLog;
use Carbon\Carbon;

class AdminBackupController extends Controller
{
    /**
     * Display backup list.
     */
    public function index()
    {
        $backups = [];
        if (Storage::exists('backups')) {
            $files = Storage::files('backups');
            foreach ($files as $file) {
                $backups[] = [
                    'name' => basename($file),
                    'size' => round(Storage::size($file) / 1024 / 1024, 2) . ' MB',
                    'date' => Carbon::createFromTimestamp(Storage::lastModified($file))->format('d M Y H:i'),
                    'path' => $file
                ];
            }
        }

        // Sort by newest
        usort($backups, function($a, $b) {
            return strtotime($b['date']) <=> strtotime($a['date']);
        });

        return view('prestasiprima.admin.settings.backup', compact('backups'));
    }

    /**
     * Create a new backup.
     */
    public function create()
    {
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');
        $dbHost = env('DB_HOST', '127.0.0.1');
        
        $filename = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
        $path = storage_path('app/backups/' . $filename);
        
        if (!is_dir(storage_path('app/backups'))) {
            mkdir(storage_path('app/backups'), 0755, true);
        }

        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s %s > %s',
            escapeshellarg($dbUser),
            escapeshellarg($dbPass),
            escapeshellarg($dbHost),
            escapeshellarg($dbName),
            escapeshellarg($path)
        );

        $output = [];
        $returnVar = null;
        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            ActivityLog::log('system', "Created database backup: $filename");
            return back()->with('success', 'Backup berhasil dibuat: ' . $filename);
        } else {
            \Log::error('Backup failed: ' . implode("\n", $output));
            return back()->with('error', 'Gagal membuat backup. Cek logs untuk detail.');
        }
    }

    /**
     * Download a backup.
     */
    public function download($filename)
    {
        $path = 'backups/' . $filename;
        if (Storage::exists($path)) {
            return Storage::download($path);
        }
        return back()->with('error', 'File tidak ditemukan.');
    }

    /**
     * Delete a backup.
     */
    public function destroy($filename)
    {
        $path = 'backups/' . $filename;
        if (Storage::exists($path)) {
            Storage::delete($path);
            ActivityLog::log('system', "Deleted backup file: $filename");
            return back()->with('success', 'Backup berhasil dihapus.');
        }
        return back()->with('error', 'File tidak ditemukan.');
    }
}
