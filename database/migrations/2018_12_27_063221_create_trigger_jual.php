<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerJual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
          'CREATE TRIGGER jual_barang AFTER INSERT ON `jual` FOR EACH ROW
                  BEGIN
                     UPDATE `stok` SET stok = stok - NEW.stok
                  WHERE kd_barang = NEW.kd_barang;
            END'
          );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `jual_barang`');
    }
}
