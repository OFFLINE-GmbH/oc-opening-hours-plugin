<?php namespace OFFLINE\OpeningHours\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class MakeExceptionHoursNullable extends Migration
{
    public function up()
    {
        Schema::table('offline_openinghours_exceptions', function ($table) {
            $table->string('hours')->nullable()->change();
        });
    }
}
