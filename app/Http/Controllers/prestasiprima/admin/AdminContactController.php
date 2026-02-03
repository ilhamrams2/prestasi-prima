<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\ContactMessage;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    /**
     * Display all contact messages with filter and search
     */
    public function index(Request $request)
    {
        $query = ContactMessage::query();
        
        // Filter by status
        if ($request->has('status')) {
            if ($request->status === 'unread') {
                $query->unread();
            } elseif ($request->status === 'read') {
                $query->read();
            }
            // 'all' doesn't need filtering
        }
        
        // Search by name or email
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('pesan', 'like', "%{$search}%");
            });
        }
        
        $messages = $query->latest()->paginate(20);
        $unreadCount = ContactMessage::unread()->count();
        
        return view('prestasiprima.admin.contact.index', compact('messages', 'unreadCount'));
    }

    /**
     * Show single message detail
     */
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        // Auto mark as read when opened
        if (!$message->is_read) {
            $message->markAsRead();
        }
        
        return view('prestasiprima.admin.contact.show', compact('message'));
    }

    /**
     * Mark message as read
     */
    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->markAsRead();
        
        return back()->with('success', 'Pesan ditandai sebagai sudah dibaca');
    }

    /**
     * Bulk mark as read
     */
    public function bulkMarkAsRead(Request $request)
    {
        $ids = $request->input('ids', []);
        
        if (empty($ids)) {
            return back()->with('error', 'Tidak ada pesan yang dipilih');
        }
        
        ContactMessage::whereIn('id', $ids)->update(['is_read' => true]);
        
        return back()->with('success', count($ids) . ' pesan ditandai sebagai sudah dibaca');
    }

    /**
     * Bulk delete messages
     */
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        
        if (empty($ids)) {
            return back()->with('error', 'Tidak ada pesan yang dipilih');
        }
        
        ContactMessage::whereIn('id', $ids)->delete();
        
        return back()->with('success', count($ids) . ' pesan berhasil dihapus');
    }

    /**
     * Delete message
     */
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();
        
        return redirect()
            ->route('prestasiprima.admin.contact.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}
