<?php

namespace Database\Seeders\presmaboard;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PresmaboardImageDownloaderSeeder extends Seeder
{
    /**
     * Download placeholder images from picsum.photos into public/uploads/presmaboard/...
     * This makes seed data show images without requiring external URLs in templates.
     */
    public function run()
    {
        $publicBase = public_path('uploads/presmaboard');

        // ensure directories exist
        File::ensureDirectoryExists($publicBase . '/students', 0755, true);
        File::ensureDirectoryExists($publicBase . '/projects', 0755, true);

        $students = DB::table('presmaboard_students')->select('id')->get();

        foreach ($students as $s) {
            $i = $s->id;
            $studentPath = $publicBase . '/students/photo_' . $i . '.jpg';
            if (! File::exists($studentPath)) {
                $url = 'https://picsum.photos/seed/student' . $i . '/400/400';
                $this->downloadTo($url, $studentPath);
            }

            // projects
            $projects = DB::table('presmaboard_projects')->where('student_id', $s->id)->pluck('id');
            foreach ($projects as $pId) {
                // try to parse project id to create a predictable filename
                $projPath = $publicBase . '/projects/proj_' . $s->id . '_' . $pId . '.jpg';
                if (! File::exists($projPath)) {
                    $url = 'https://picsum.photos/seed/project_' . $s->id . '_' . $pId . '/800/600';
                    $this->downloadTo($url, $projPath);
                }
            }
        }
    }

    private function downloadTo(string $url, string $dest): void
    {
        try {
            // Use file_get_contents; if allow_url_fopen is disabled this may fail.
            $contents = @file_get_contents($url);
            if ($contents === false) {
                // create a tiny placeholder JPG if download fails
                $contents = $this->tinyPlaceholder();
            }
            file_put_contents($dest, $contents);
        } catch (\Throwable $e) {
            // create tiny placeholder on failure
            file_put_contents($dest, $this->tinyPlaceholder());
        }
    }

    private function tinyPlaceholder(): string
    {
        // 1x1 white pixel JPEG base64
        return base64_decode(
            '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAP//////////////////////////////////////////////////////////////////////////////////////2wBDAf//////////////////////////////////////////////////////////////////////////////////////wAARCAABAAEDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAf/xAAUEAEAAAAAAAAAAAAAAAAAAAAA/8QAFQEBAQAAAAAAAAAAAAAAAAAAAQL/xAAUEQEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIRAxEAPwD9/9k='
        );
    }
}
