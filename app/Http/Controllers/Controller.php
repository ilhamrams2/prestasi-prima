<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API Portal SMK Prestasi Prima",
 *      description="Dokumentasi resmi API untuk Portal SMK Prestasi Prima. Menyediakan akses ke data siswa, berita, galeri, dan fitur admin lainnya.",
 *      @OA\Contact(
 *          email="admin@smkprestasiprima.sch.id"
 *      ),
 *      @OA\License(
 *          name="Proprietary",
 *          url="https://smkprestasiprima.sch.id"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Server Utama (Localhost)"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
