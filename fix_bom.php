<?php

$files = [
    'app/Http/Controllers/prestasiprima/admin/AdminNewsController.php',
    'app/Http/Controllers/prestasiprima/admin/AdminGalleryController.php',
    'app/Http/Controllers/prestasiprima/admin/AdminPrestasiController.php',
    'app/Http/Controllers/prestasiprima/admin/AdminKaryaProyekController.php',
    'app/Http/Controllers/prestasiprima/admin/AdminKegiatanController.php',
    'app/Http/Controllers/prestasiprima/admin/AdminEkstrakurikulerController.php',
    'app/Http/Controllers/prestasiprima/admin/AdminStaffController.php',
    'app/Http/Controllers/prestasiprima/admin/AdminIndustriController.php',
    'app/Http/Controllers/prestasiprima/admin/AdminTestimoniController.php',
    'app/Http/Controllers/prestasiprima/admin/AdminMikrotikTrainerController.php',
    'app/Http/Controllers/prestasiprima/admin/AdminUserController.php',
    'app/Services/prestasiprima/MediaService.php'
];

foreach ($files as $file) {
    $path = __DIR__ . '/' . $file;
    if (file_exists($path)) {
        $content = file_get_contents($path);
        
        // Check for BOM (EF BB BF)
        if (substr($content, 0, 3) === pack('CCC', 0xEF, 0xBB, 0xBF)) {
            echo "Removing BOM from: $file\n";
            $content = substr($content, 3);
            file_put_contents($path, $content);
        } else {
            echo "No BOM found in: $file\n";
        }
    } else {
        echo "File not found: $file\n";
    }
}
