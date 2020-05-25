<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int    id
 * @property float  temp
 * @property float  humidity
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Measurement extends Model
{
    protected $fillable = [
        'temp',
        'humidity',
    ];
}
