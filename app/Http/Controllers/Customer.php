<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Customer extends Controller
{
    public function getAllReadingsForCustomer() {
        
        return DB::table('readings')
            ->join('meters', 'readings.meter_id','=','meters.id')
            ->join('customer_meter','meters.id','=','customer_meter.meter_id')
            ->join('customers','customer_meter.customer_id','=','customers.id')
            ->where('customers.name','=','SYMVARO')
            ->get();
    }


    public function getCustomerWithMostMeters() {
        
        return DB::table('customers as c')
            ->select('c.name as customer_name', DB::raw('COUNT(c.id) as amount_meters'))
            ->join('customer_meter as cm', 'c.id', '=', 'cm.customer_id')
            ->join('meters as m', 'cm.meter_id', '=', 'm.id')
            ->groupBy('c.id')
            ->orderBy('amount_meters', 'desc')
            ->limit(1)
            ->first();
    }


    public function getAllCustomerViaApp() {
        return DB::table('customers as c')
            ->join('customer_meter','c.id','=','customer_meter.customer_id')
            ->join('meters','customer_meter.meter_id','=','meters.id')
            ->join('readings', 'meters.id','=','readings.meter_id')
            ->where('readings.systemtype','=','app')
            ->get();
    }



    public function getAllReadingsForSpecificCustomer(Request $request) {
        
        return DB::table('readings')
            ->join('meters', 'readings.meter_id','=','meters.id')
            ->join('customer_meter','meters.id','=','customer_meter.meter_id')
            ->join('customers','customer_meter.customer_id','=','customers.id')
            ->where('customers.name','=',$request->input('name'))
            ->get();
    }
}
