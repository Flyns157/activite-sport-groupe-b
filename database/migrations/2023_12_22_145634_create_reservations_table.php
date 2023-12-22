<?php

use App\Models\Activite;
use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $d = new DateTime('now');
            $table->dateTime('debut')->default($d->format('Y-m-d H:i:s'));
            $h = new DateInterval("PT1H");
            $table->dateTime('fin')->default($d->add($h)->format('Y-m-d H:i:s'));
            $table->integer('participants')->default(1);
            $table->foreignIdFor(Client::class)->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignIdFor(Activite::class)->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('reservations');
    }
};
