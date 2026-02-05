<?php
use App\Models\prestasiprima\PPuser;
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$u = PPuser::where('email', 'admin@smkprestasiprima.sch.id')->first();
if ($u) {
    $u->role = 'super_admin';
    $u->save();
    echo "Role updated for " . $u->email . "\n";
} else {
    echo "User not found\n";
}
