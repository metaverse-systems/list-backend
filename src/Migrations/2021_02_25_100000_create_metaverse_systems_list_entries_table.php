<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaverseSystemsListEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metaverse_systems_list_entries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->uuid('user_id');
            $table->uuid('list_id');
            $table->string('text');
            $table->enum('checked', ['none', 'checked', 'unchecked'])->default('none');
            $table->bigInteger('count')->default(-1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metaverse_systems_list_entries');
    }
}
