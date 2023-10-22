<?php

namespace App\Models;

use App\Models\User;
use App\Models\Groups;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institution extends Model
{
    use HasFactory;

    protected $table = "institucion";

    public function users(): HasMany{
        return $this->hasMany(User::class);
    }

    public function gruops(): HasMany{
        return $this->hasMany(Groups::class);
    }

}
