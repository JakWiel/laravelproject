<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;
    const UPDATED_AT = "dateEdited";
    const CREATED_AT = "dateCreated";
    protected $table = "Services";
    protected $primaryKey = "id";
    public function bookingServices()
    {
        return $this->hasMany(BookingServiceModel::class);
    }


}
