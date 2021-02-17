<?php

namespace App\Admin\Controllers\Indonesian;

use App\Http\Controllers\Controller;
use App\Models\Indonesian\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function provinces(Request $request)
    {
        $q = $request->get('q');

        return Province::where('Name', 'like', "%$q%")->paginate(null, [DB::raw('ID as id'), DB::raw('Name as text')]);
    }
}
