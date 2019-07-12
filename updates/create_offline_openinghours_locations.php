<?php namespace OFFLINE\OpeningHours\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateOfflineOpeninghoursLocations extends Migration
{
    public function up()
    {
        Schema::create('offline_openinghours_locations', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('sort_order')->nullable()->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('offline_openinghours_locations');
    }
}
