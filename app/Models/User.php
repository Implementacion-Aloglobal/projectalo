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

    /** 
     * Preventas creadas por este usuario
     */
    public function createdPreSales(): HasMany
    {
        return $this->hasMany(Presale::class, 'created_by');
    }

    /** 
     * Preventas donde este usuario es el comercial asignado
     */
    public function commercialPreSales(): HasMany
    {
        return $this->hasMany(Presale::class, 'commercial_id');
    }

    /** 
     * Preventas donde este usuario es el implementador asignado
     */
    public function assignedPreSales(): HasMany
    {
        return $this->hasMany(Presale::class, 'assigned_to');
    }

    /** 
     * Preventas actualizadas por este usuario
     */
    public function updatedPreSales(): HasMany
    {
        return $this->hasMany(Presale::class, 'updated_by');
    }
}
