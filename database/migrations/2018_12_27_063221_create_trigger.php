<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::unprepared(
        //   'CREATE TRIGGER beli_barang AFTER INSERT ON `beli` FOR EACH ROW
        //           BEGIN
        //              UPDATE `stok` SET (`stok`, `created_at`, `updated_at`) VALUES (NEW.stok, now(), null) WHERE `kd_barang` = NOW.kd_barang;
        //     END'
        //   );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `beli_barang`');
    }
}
