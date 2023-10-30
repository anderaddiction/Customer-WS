<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table   = 'regions';

    /**
     * Get all of the communes for the Region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communes(): HasMany
    {
        return $this->hasMany(Commun::class, 'id_reg', 'id');
    }

    /**
     * Get all of the customers for the Region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class, 'id_reg', 'id');
    }
}
