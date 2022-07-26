<?php

namespace App\Http\Controllers\api;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ApiController extends Controller
{

    public function shorten()
    {
        $shortLinks = ShortLink::latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully',
            'data' => $shortLinks
        ], 200);
    }

    public function generate_link(Request $request)
    {
        // $request->validate([
        //     'link' => 'required|url'
        // ]);

        $data = new ShortLink();
        $data->link = $request->link;
        $data->code = str::random(6);
        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Link data inserted succesfully',
            'data' => $data
        ], 201);
    }

    // public function goto_link($shortLink, Request $request)
    // {
    //     $find = ShortLink::where('code', $shortLink)->first();
    //     // dd($request->getClientIps());
    //     return response()->redirect($find->link);
    // }
}
