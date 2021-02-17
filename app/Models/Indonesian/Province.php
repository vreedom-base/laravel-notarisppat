<?php

namespace App\Models\Indonesian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public static function options($id)
    {
        return static::where('ID', $id)->get()->map(function ($province) {
            return [$province->ID => $province->Name];
        })->flatten();
    }
}
