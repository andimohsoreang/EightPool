<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

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
        'transaction_type',
        'user_id',
        'billard_table_id',
        'date',
        'start_time',
        'end_time',
        'actual_end_time',
        'total_hours',
        'total_price',
        'status',
        'admin_id',
        'notes'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'actual_end_time' => 'datetime:H:i',
        'total_hours' => 'decimal:2',
        'total_price' => 'decimal:2'
    ];

    /**
     * Get the user who made the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the billard table for this transaction.
     */
    public function billardTable()
    {
        return $this->belongsTo(BillardTable::class, 'billard_table_id', 'id');
    }

    /**
     * Get the admin who handled the transaction.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'transaction_id', 'id');
    }
}
