<?php

namespace App\Http\Controllers;

use App\Models\AuctionValue;
use Illuminate\Http\Request;

class EastMeetsWestController extends Controller
{
    public function index()
    {
        $numbers = AuctionValue::orderBy('created_at', 'desc')->get();
        $total = $numbers->sum('bid');

        return view('auction.index', compact('numbers', 'total'));
    }

    public function save(Request $request)
    {
        $number = new AuctionValue();
        $number->bid = $request->input('number');
        $number->save();

        $total = number_format(AuctionValue::sum('bid'));
        $messages = __('bids.thank-you');
        $randomMessage = $messages[array_rand($messages)];

        return response()->json(['total' => $total, 'bid' => number_format($number->bid), 'thankyou' => $randomMessage]);
    }

    public function manager()
    {
        $numbers = AuctionValue::orderBy('created_at', 'desc')->get();
        $total = $numbers->sum('bid');

        return view('auction.manager', compact('numbers', 'total'));
    }

    public function delete(AuctionValue $auctionValue)
    {
        $auctionValue->delete();
        return redirect()->back();
    }
}
