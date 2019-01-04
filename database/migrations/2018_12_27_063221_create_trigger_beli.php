<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerBeli extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
          'CREATE TRIGGER beli_barang AFTER INSERT ON `beli` FOR EACH ROW
                  BEGIN
                     UPDATE `stok` SET stok = stok + NEW.stok
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
        DB::unprepared('DROP TRIGGER `beli_barang`');
    }
}
