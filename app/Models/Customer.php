<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table   = 'customers';
    public $timestamps = false;

    // public function getRouteKeyName()
    // {
    //     return 'dni';
    // }


    /**
     * Get the region that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'id_reg', 'id_reg');
    }

    /**
     * Get the region that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commun(): BelongsTo
    {
        return $this->belongsTo(Commun::class, 'id_com', 'id_com');
    }
}
