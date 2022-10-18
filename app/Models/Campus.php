<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'logo',
        'accreditation',
        'telephone',
        'fax',
        'website',
        'is_polytechnic',
        'type_id',
        'status_id',
        'address_id',
    ];



    public function users()
    {
        return $this->belongsToMany(User::class, 'follows', 'campus_id', 'user_id');
    }

    public function follows()
    {
        return $this->hasMany(Follow::class);
    }

    public function majors()
    {
        return $this->belongsToMany(Major::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
