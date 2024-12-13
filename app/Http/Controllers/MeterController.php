<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meter;

class MeterController extends Controller
{
    public function addNewMeter(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
        ]);

        $items=new Meter();
        $items->location = $request->location;

        $items->save();
    }



    public function editMeter(Request $request)
    {

        $location = $request->input(
            'location'
        );
        
        $id = $request->input(
            'id'
        );
        
        $items = Meter::findOrfail($id);
        $items->location = $location;

        $items->save();
        return $request;
    }
        

        public function delete(Request $request){

            try {
                $id = $request->input(
                    'id',
                );
                Meter::findOrFail($id)->delete();
                return response()->json(['message' => 'Deleted successfully'], 200);
            }
            catch(\ModelNotFoundException $e) {
                return response()->json(['message' => $exception->getMessage()], 500);
                // return $e;
            }
            catch(\Excpection $e) {
                // return $e;
                return response()->json(['message' => $exception->getMessage()], 500);
            }
         }


}
