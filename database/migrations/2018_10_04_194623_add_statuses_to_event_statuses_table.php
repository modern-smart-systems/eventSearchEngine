<?php

use App\EventStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusesToEventStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $statuses = [['status' => EventStatus::statusPublic], ['status' => EventStatus::statusPrivate]];
        DB::table('event_statuses')->insert($statuses);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('event_statuses')->where('status', EventStatus::statusPublic)->delete();;
        DB::table('event_statuses')->where('status', EventStatus::statusPrivate)->delete();;
    }
}
