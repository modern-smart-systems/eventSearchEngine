<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code", 5)->nullable(false);
            $table->string("name", 20)->nullable(false);
        });

        $roles = [
            [
                "code" => "admin",
                "name" => "Administrator"
            ],
            [
                "code" => "mod",
                "name" => "Moderator"
            ],
            [
                "code" => "user",
                "name" => "User"
            ],
        ];

        DB::table("roles")->insert($roles);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
