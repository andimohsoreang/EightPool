<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prices';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'billard_table_id',
        'start_time',
        'end_time',
        'price_per_hour',
        'day_type',
        'valid_from',
        'valid_to'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'price_per_hour' => 'decimal:2',
        'valid_from' => 'date',
        'valid_to' => 'date'
    ];

    /**
     * Get the billard table that owns the price.
     */
    public function billardTable()
    {
        return $this->belongsTo(BillardTable::class, 'billard_table_id', 'id');
    }
}
