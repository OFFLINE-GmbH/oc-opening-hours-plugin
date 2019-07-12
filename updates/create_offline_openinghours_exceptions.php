<?php namespace OFFLINE\OpeningHours\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateOfflineOpeninghoursException extends Migration
{
    public function up()
    {
        Schema::create('offline_openinghours_exceptions', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('for_date');
            $table->boolean('yearly')->default(0);
            $table->text('hours');
            $table->string('note')->nullable();
            $table->integer('location_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offline_openinghours_exceptions');
    }
}
