<?php

namespace App\Models;

use App\Models\Indonesian\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function province()
    {
        return $this->belongsTo(Province::class, 'ProvinceCode', 'Code');
    }
}
