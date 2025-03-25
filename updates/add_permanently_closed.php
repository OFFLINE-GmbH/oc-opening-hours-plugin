<?php namespace OFFLINE\OpeningHours\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateOfflineOpeninghoursLocations extends Migration
{
    public function up()
    {
        Schema::table('offline_openinghours_locations', function($table)
        {
            $table->boolean('is_permanently_closed')->nullable()->after('sort_order');
            $table->dateTime('permanently_closed_until')->nullable()->after('is_permanently_closed');
        });
    }

    public function down()
    {
        Schema::table('offline_openinghours_locations', function($table)
        {
            $table->dropColumn('permanently_closed_until');
            $table->dropColumn('is_permanently_closed');
        });
    }
}
