<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
    
        $datas = Service::select('service_name')->where("service_name", "LIKE", "%{$request->input('query')}%")->get();

        $dataModified = array();
        foreach ($datas as $data)
        {
            $dataModified[] = $data->service_name;
        }

        return response()->json($dataModified);
    }

    public function searchServices(Request $request)
    {
        $service_slug = Str::slug($request->q, '-');

        if ($service_slug) {
            return redirect('serviceDetails/'.$service_slug);
        } else {
            return back();
        }
        
    }
}
