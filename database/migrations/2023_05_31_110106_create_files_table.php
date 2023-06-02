<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->integer("customer_id");
            $table->integer("post_id");
            $table->string("url");
            $table->integer("file_type_id");
            $table->boolean("status")->default(false);
            $table->foreign("customer_id")->on("customers")->references("id");
            $table->foreign("post_id")->on("posts")->references("id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
