<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke model Customer Detail
    public function customerDetail()
    {
        return $this->hasOne(CustomerDetail::class, 'user_id', 'id');
    }

    /**
     * Relasi transaksi yang dibuat oleh user
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    /**
     * Relasi transaksi yang ditangani admin
     */
    public function administeredTransactions()
    {
        return $this->hasMany(Transaction::class, 'admin_id', 'id');
    }

    // Pembayaran yang ditangani oleh finance
    public function financedPayments()
    {
        return $this->hasMany(Payment::class, 'finance_id', 'id');
    }

    /**
     * Cek apakah user adalah admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin'; // Asumsikan ada kolom role di tabel users
    }
}
