<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\SiteSetting;
use App\Models\prestasiprima\ActivityLog;

class AdminSettingController extends Controller
{
    /**
     * Display site settings grouped by category.
     */
    public function index()
    {
        $settings = SiteSetting::all()->groupBy('group');
        return view('prestasiprima.admin.settings.index', compact('settings'));
    }

    /**
     * Update site settings.
     */
    public function update(Request $request)
    {
        try {
            $settings = SiteSetting::all();

            foreach ($settings as $setting) {
                $key = $setting->key;
                $oldValue = $setting->value;

                if ($setting->type === 'image') {
                    if ($request->hasFile($key)) {
                        // Ensure directory exists
                        if (!file_exists(public_path('uploads/settings'))) {
                            mkdir(public_path('uploads/settings'), 0777, true);
                        }

                        // Delete old file
                        if ($oldValue && file_exists(public_path($oldValue))) {
                            unlink(public_path($oldValue));
                        }

                        $file = $request->file($key);
                        $filename = 'setting_' . $key . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('uploads/settings'), $filename);
                        $setting->update(['value' => 'uploads/settings/' . $filename]);
                        
                        ActivityLog::log('update', "Memperbarui gambar pengaturan: {$setting->label}");
                    }
                } elseif ($setting->type === 'boolean') {
                    $newValue = $request->has($key) ? '1' : '0';
                    if ($oldValue != $newValue) {
                        $setting->update(['value' => $newValue]);
                        $status = $newValue == '1' ? 'AKTIF' : 'NON-AKTIF';
                        ActivityLog::log('update', "Mengubah status {$setting->label} menjadi {$status}");
                    }
                } else {
                    if ($request->has($key)) {
                        $newValue = $request->input($key);
                        if ($oldValue != $newValue) {
                            $setting->update(['value' => $newValue]);
                            ActivityLog::log('update', "Mengubah {$setting->label} dari '{$oldValue}' menjadi '{$newValue}'");
                        }
                    }
                }
            }

            SiteSetting::clearCache();

            return back()->with('success', 'Pengaturan berhasil diperbarui.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui pengaturan: ' . $e->getMessage());
            return back()->with('error', 'Gagal memperbarui pengaturan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Initialize default settings (one-time).
     */
    public function init()
    {
        $defaults = [
            // General
            ['key' => 'site_name', 'value' => 'SMK Prestasi Prima', 'label' => 'Nama Situs', 'type' => 'text', 'group' => 'general', 'description' => 'Nama sekolah yang akan muncul di judul website.'],
            ['key' => 'site_description', 'value' => 'Sekolah Berbasis Kompetensi dan Akhlak Mulia', 'label' => 'Deskripsi Situs', 'type' => 'textarea', 'group' => 'general', 'description' => 'Slogan atau deskripsi singkat sekolah.'],
            ['key' => 'site_motto', 'value' => 'IF BETTER IS POSSIBLE, GOOD IS NOT ENOUGH!', 'label' => 'Motto Sekolah', 'type' => 'text', 'group' => 'general', 'description' => 'Motto atau slogan singkat yang muncul di footer.'],
            ['key' => 'maintenance_mode', 'value' => '0', 'label' => 'Maintenance Mode', 'type' => 'boolean', 'group' => 'general', 'description' => 'Aktifkan untuk menampilkan halaman perbaikan.'],
            
            // Identity
            ['key' => 'site_logo', 'value' => '', 'label' => 'Logo Website', 'type' => 'image', 'group' => 'identity', 'description' => 'Logo utama sekolah (PNG recommended).'],
            ['key' => 'site_favicon', 'value' => '', 'label' => 'Favicon', 'type' => 'image', 'group' => 'identity', 'description' => 'Icon kecil di tab browser (ICO/PNG 32x32).'],
            
            // Appearance
            ['key' => 'primary_color', 'value' => '#FF6B00', 'label' => 'Warna Utama', 'type' => 'color', 'group' => 'appearance', 'description' => 'Warna dominan untuk website (Header, Button, dll).'],
            ['key' => 'secondary_color', 'value' => '#1e293b', 'label' => 'Warna Sekunder', 'type' => 'color', 'group' => 'appearance', 'description' => 'Warna pendukung (Footer, Background, dll).'],

            // Contact
            ['key' => 'contact_email', 'value' => 'info@prestasiprima.sch.id', 'label' => 'Email Kontak', 'type' => 'text', 'group' => 'contact', 'description' => 'Email resmi sekolah untuk korespondensi.'],
            ['key' => 'contact_phone', 'value' => '021-1234567', 'label' => 'Telepon', 'type' => 'text', 'group' => 'contact', 'description' => 'Nomor telepon kantor sekolah.'],
            ['key' => 'address', 'value' => 'Jl. Hankam Raya No. 89, Cilangkap, Cipayung, Jakarta Timur', 'label' => 'Alamat', 'type' => 'textarea', 'group' => 'contact', 'description' => 'Alamat lengkap lokasi sekolah.'],
            ['key' => 'map_iframe', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4748268020353!2d106.8972187!3d-6.332476499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed2681bc7c67%3A0x777152b1d3f74a62!2sSMK%20Prestasi%20Prima!5e0!3m2!1sid!2sid!4v1756647265168!5m2!1sid!2sid', 'label' => 'URL Google Maps (Embed)', 'type' => 'textarea', 'group' => 'contact', 'description' => 'Masukkan atribut src dari kode embed Google Maps.'],
            
            // Social Media
            ['key' => 'facebook_url', 'value' => '#', 'label' => 'Facebook URL', 'type' => 'text', 'group' => 'social', 'description' => 'Link ke halaman Facebook resmi.'],
            ['key' => 'instagram_url', 'value' => '#', 'label' => 'Instagram URL', 'type' => 'text', 'group' => 'social', 'description' => 'Link ke profile Instagram resmi.'],
            ['key' => 'youtube_url', 'value' => '#', 'label' => 'YouTube URL', 'type' => 'text', 'group' => 'social', 'description' => 'Link ke channel YouTube resmi.'],

            // SEO
            ['key' => 'meta_keywords', 'value' => 'smk, prestasi, prima, jakarta', 'label' => 'Meta Keywords', 'type' => 'textarea', 'group' => 'seo', 'description' => 'Kata kunci untuk mesin pencari (pisahkan dengan koma).'],
            ['key' => 'google_analytics_id', 'value' => '', 'label' => 'Google Analytics ID', 'type' => 'text', 'group' => 'seo', 'description' => 'ID pelacakan GA4 (e.g., G-XXXXXXXXXX).'],
        ];

        foreach ($defaults as $item) {
            SiteSetting::updateOrCreate(['key' => $item['key']], $item);
        }

        return redirect()->route('prestasiprima.admin.settings.index')->with('success', 'Pengaturan berhasil diinisialisasi ulang.');
    }
}
