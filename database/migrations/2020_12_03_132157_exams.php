<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Exams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
          $table->id();

          $table->integer('id_class',11)->nullable();
          $table->integer('id_student',11)->nullable();
          $table->string('name',255)->nullable();
          $table->float('mark',11)->nullable();

           /* $table->string('name', 255)->nullable();
            $table->string('description', 500)->nullable();
            $table->decimal('price', 22)->nullable()->default(0.00);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');

    }
}
