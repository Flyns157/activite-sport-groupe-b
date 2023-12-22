<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model {
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function clients() {
        return $this->belongsToMany(Client::class, 'avis')
            ->as('avis')
            ->withPivot('note', 'commentaire')
            ->withTimestamps();
    }
}
