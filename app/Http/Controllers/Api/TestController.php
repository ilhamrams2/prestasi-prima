<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Sistem",
 *     description="Endpoint untuk testing dan verifikasi API"
 * )
 */
class TestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/test",
     *     operationId="testApi",
     *     tags={"Sistem"},
     *     summary="Test koneksi API",
     *     description="Endpoint untuk memverifikasi bahwa API berjalan dengan baik",
     *     @OA\Response(
     *         response=200,
     *         description="Koneksi berhasil",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="API Portal SMK Prestasi Prima berjalan dengan baik"),
     *             @OA\Property(property="version", type="string", example="1.0.0")
     *         )
     *     )
     * )
     */
    public function test()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'API Portal SMK Prestasi Prima berjalan dengan baik',
            'version' => '1.0.0'
        ]);
    }
}
