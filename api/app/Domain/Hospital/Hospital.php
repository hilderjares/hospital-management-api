<?php

declare(strict_types=1);

namespace App\Domain\Hospital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use SoftDeletes;

    protected $table = 'hospital';
    protected $fillable = [
        'id',
        'name',
        'city',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
