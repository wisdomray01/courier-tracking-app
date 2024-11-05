<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tracking_events', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tracker_id')->constrained()->onDelete('cascade'); // Foreign key to trackers
        $table->string('tracking_number'); // Tracking number from the trackers table
        $table->string('status'); // Status of the package
        $table->string('remarks')->nullable()->change();
        $table->string('senders_name')->nullable();
        $table->string('receivers_name')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tracking_events', function (Blueprint $table) {
            $table->string('remarks')->nullable(false)->change(); // Revert to not nullable
        });
    }
};
