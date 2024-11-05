<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trackers', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number')->unique(); // Unique tracking number
            $table->string('status'); // status
            $table->date('sent_date'); // Date when the item was sent
            $table->date('arrival_date'); // Expected arrival date
            $table->string('senders_name'); // Sender's name
            $table->string('senders_email'); // Sender's email
            $table->string('senders_phone', 20); // Sender's phone number
            $table->string('senders_address'); // Sender's address
            $table->string('senders_country'); // Sender's country
            $table->string('receivers_name'); // Receiver's name
            $table->string('receivers_email'); // Receiver's email
            $table->string('receivers_phone', 20); // Receiver's phone number
            $table->string('receivers_address'); // Receiver's address
            $table->string('receivers_country'); // Receiver's country
            $table->string('items'); // Item descriptions
            $table->string('weight'); // Weight of the items
            $table->string('shipping_method'); // Shipping method
            $table->decimal('tax', 8, 2); // Tax amount
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trackers');
    }
};
