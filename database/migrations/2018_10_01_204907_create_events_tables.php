<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("event_statuses", function (Blueprint $table) {
            $table->increments("id");
            $table->string("status", 10)->nullable(false);
        });

        Schema::create("event_types", function (Blueprint $table) {
            $table->increments("id");
            $table->string("type", 10)->nullable(false);
            $table->string("name", 10)->nullable(false);
        });

        Schema::create("events", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name", 50)->nullable(false);
            $table->text("description");
            $table->string("country", 20)->nullable(false);
            $table->string("city", 20)->nullable(false);
            $table->string("address", 100)->nullable(false);
            $table->float("lat")->nullable(false);
            $table->float("lon")->nullable(false);
            $table->unsignedInteger("type")->nullable(false);
            $table->unsignedInteger("author_id")->nullable(false);
            $table->unsignedInteger("status")->nullable(false);
            $table->timestamp("begin_time")->nullable(false);
            $table->timestamp("end_time");
            $table->timestamp("update_at");
            $table->timestamp("created_at")->useCurrent();

            $table->foreign("author_id")->references("id")->on("users");
            $table->foreign("status")->references("id")->on("event_statuses");
            $table->foreign("type")->references("id")->on("event_types");
        });

        Schema::create("event_invites", function (Blueprint $table) {
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("event_id");

            $table->primary(["user_id", "event_id"]);
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("event_id")->references("id")->on("events");
        });

        Schema::create("event_images", function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("event_id");
            $table->string("path", 50);
            $table->string("title", 50);

            $table->foreign("event_id")->references("id")->on("events");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists("event_statuses");
        Schema::dropIfExists("event_types");
        Schema::dropIfExists("event_invites");
        Schema::dropIfExists("events");
        Schema::dropIfExists("event_events");
    }
}
