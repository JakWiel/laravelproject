<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingServiceModel extends Model
{
    use HasFactory;
    const UPDATED_AT = "dateEdited";
    const CREATED_AT = "dateCreated";
    protected $table = "booking_services";
    protected $primaryKey = "id";
}
