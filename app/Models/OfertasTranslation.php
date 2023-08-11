<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertasTranslation extends Model
{
	use HasFactory;

    protected $fillable = [
		'title',
		'description',
		'text'
	];

    public $timestamps = false;
}
