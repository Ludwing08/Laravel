<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    public function users(): BelongsToMany
    {
                                    //model-relacionado, table, key model, key relation
        return $this->belongsToMany(User::class, 'user_role', 'role_id', 'user_id');
    }
}
 