<?php

namespace App\Http\Controllers\prestasiprima;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryaProyekController extends Controller
{
    /**
     * Menampilkan halaman utama Karya & Proyek Siswa
     */
    public function index()
    {
        $projects = [
            [
                'title' => 'Simulator Roblox: Presma Tycoon',
                'category' => 'Game Development',
                'description' => 'Game simulasi karya siswa RPL yang mengajarkan manajemen sumber daya dan kolaborasi dalam dunia virtual Roblox.',
                'image' => asset('assets/images/karya-proyek/roblox.webp'),
                'tags' => ['RPL', 'Roblox', 'GameDev'],
                'link' => 'https://www.roblox.com/id/games/17508460500/Presma-Simulator-RP',
            ],
            [
                'title' => 'Website Absensi Siswa',
                'category' => 'Web Development',
                'description' => 'Proyek digital absensi modern berbasis Laravel dan Tailwind yang dikembangkan untuk kebutuhan sekolah.',
                'image' => asset('assets/images/karya-proyek/absensi.png'),
                'tags' => ['Laravel', 'Tailwind', 'WebApp'],
                'link' => 'https://github.com/JongBatak/spmb',
            ],
            [
                'title' => 'Desain Poster Digital',
                'category' => 'Desain Kreatif',
                'description' => 'Karya visual siswa DKV dengan tema motivasi dan semangat belajar, menggunakan Adobe Illustrator.',
                'image' => asset('assets/images/karya-proyek/poster.jpeg'),
                'tags' => ['DKV', 'Adobe', 'Poster'],
                'link' => '#', // link bisa diarahkan ke hasil desain
            ],
        ];

        return view('prestasiprima.pages.karya-proyek', compact('projects'));
    }


    /**
     * Menampilkan detail dari proyek tertentu
     */
    public function show($slug)
    {
        $projects = [
            // Data proyek bisa disamakan atau diambil dari database nanti
        ];

        $project = collect($projects)->firstWhere('slug', $slug);

        if (!$project) {
            abort(404);
        }

        return view('prestasiprima.pages.karya-proyek-detail', compact('project'));
    }
}
