<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking',
    ];

    /**
     * Get the Person  associated with the package.
     */
    public function person(): HasOne
    {
        return $this->hasOne(Person::class);
    }
}
