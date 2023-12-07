<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tambon;
use App\Models\follow_pipe;

class TambonController extends Controller
{

    public function check_follows(){
        
        follow_pipe::where('follow_pipes_status', 1)
        ->update([
            'night_set' => 1
            ]);

        return response()->json(['status'=> 'success' ]);

    }

    public function getProvinces()
    {
        $provinces = Tambon::select('province')
            ->distinct()
            ->get();
        return $provinces;
    }
    public function getAmphoes(Request $request)
    {
        $province = $request->get('province');
        $amphoes = Tambon::select('amphoe')
            ->where('province', 'like', "%$province%")
            ->distinct()
            ->get();
        return $amphoes;
    }
    public function getTambons(Request $request)
    {
        $province = $request->get('province');
        $amphoe = $request->get('amphoe');
        $tambons = Tambon::select('tambon')
            ->where('province', 'like', "%$province%")
            ->where('amphoe', 'like', "%$amphoe%")
            ->distinct()
            ->get();
        return $tambons;
    }
    public function getZipcodes(Request $request)
    {
        $province = $request->get('province');
        $amphoe = $request->get('amphoe');
        $tambon = $request->get('tambon');
        $zipcodes = Tambon::select('zipcode')
            ->where('province', $province)
            ->where('amphoe', $amphoe)
            ->where('tambon', $tambon)
            ->get();
        return $zipcodes;
    }
}