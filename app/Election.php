<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ElectionPost;

class Election extends Model
{
    public function host() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function posts() {
        return $this->hasMany(ElectionPost::class, 'election_id');
    }
}
