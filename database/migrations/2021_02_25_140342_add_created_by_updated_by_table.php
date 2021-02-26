<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedByUpdatedByTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disposisis', function (Blueprint $table) {
            $table->bigInteger('created_by')->after('batas_waktu');
            $table->bigInteger('updated_by')->after('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disposisis', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
        });
    }
}
