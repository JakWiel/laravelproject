<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    const UPDATED_AT = "dateEdited";
    const CREATED_AT = "dateCreated";
    protected $table = "Bookings";
    protected $primaryKey = "id";
    public function pet()
    {
        return $this->belongsTo(PetModel::class);
    }
    public function kennelSpace()
    {
        return $this->belongsTo(KennelSpaceModel::class);
    }
    public function bookingServices()
    {
        return $this->hasMany(BookingServiceModel::class);
    }

}
