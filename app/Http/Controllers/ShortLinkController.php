<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{


    public function index()
    {
        $short = ShortLink::latest()->paginate(2);

        return view('show', compact('short'));
    }

    public function generate_link(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $input['link'] = $request->link;
        $input['code'] = str::random(6);

        ShortLink::create($input);
        return redirect('/')->with('success', 'Shorten Link Created Successfully!');
    }


    public function goto_link($shortLink, Request $request)
    {
        $find = ShortLink::where('code', $shortLink)->first();
        // dd($request->getClientIps());
        return redirect($find->link);
    }
}
