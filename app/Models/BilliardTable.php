<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillardTable extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'billard_tables';

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
        'brand',
        'table_number',
        'status',
        'total_play_hours',
        'room_id',
        'notes'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'total_play_hours' => 'decimal:2',
        'status' => 'string'
    ];

    /**
     * Get the room that owns the billard table.
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    // Relasi ke Model Price One To Many
    public function Price()
    {
        return $this->hasMany(Price::class, 'billard_table_id', 'id');
    }

    // Relasi ke model transaction one to many
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'billard_table_id', 'id');
    }
}
