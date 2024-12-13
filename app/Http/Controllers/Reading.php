<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reading as ReadingModel;
use App\Models\Meter;

class Reading extends Controller
{
    public function getAllMetersInApril(){
        
        $readingIds = ReadingModel::where(
            'reading', '>=', '2022-04-01'
        )
        ->where(
            'reading', '<=', '2022-04-30'
        )
        ->pluck(
            'id'
        );

        $meters = Meter::whereIn(
            'id', $readingIds
        )->get();
    
        return $meters;

    }

}
