<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApplication extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'application_status',
        'full_name',
        'email',
        'country',
        'visa_types'
    ];
}
