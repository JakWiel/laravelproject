<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetModel extends Model
{
    use HasFactory;
    const UPDATED_AT = "dateEdited";
    const CREATED_AT = "dateCreated";
    protected $table = "Pets";
    protected $primaryKey = "id";
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
    public function bookings()
    {
        return $this->hasMany(BookingModel::class);
    }


}
