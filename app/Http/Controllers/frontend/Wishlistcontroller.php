<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Carbon\carbon;


class Wishlistcontroller extends Controller
{
    //


    public function AddToWishList(Request $request, $property_id)
    {

        if (Auth::check()) {

            $exists = Wishlist::where('user_id', Auth::id())->where('property_id', $property_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'property_id' => $property_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            } else {
                return response()->json(['error' => 'This Property Has Already in your WishList']);
            }
        } else {
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }
}
