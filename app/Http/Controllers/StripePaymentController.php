<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\product;
use App\Models\Review;
use DB;

class StripePaymentController extends Controller
{
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function stripe()
    {
    // return $re = product::where('id',3)
    // ->orWhere(function($query){
    //             $query->where('id',4)
    //             ->orWhere(function($q) {
    //             $q->where('id',6)
    //             ->where('id',7);
    //         });
    //         })
    // ->toSql();
     // return $data  = product:: select(DB::raw('count(*) as user_count'))
     //              ->get();
            
            // DB::insert('insert into users(name,email,password) values(?,?,?)',[
            //     'sarthak','s@gmail.com','12345678',]);

   
    // DB::table('products')
    // ->chunkById(10,function($users){
    //     foreach($users as $user){
    //         DB::table('products')
    //         ->where('id',$user->id)
    //         ->update(['stock'=>20]);
    //     }
    // });

    return $users = DB::table('products')
            ->join('reviews', 'products.id', '=', 'Reviews.product_id')
            
            ->get();
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       $charge =   Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
  
       
          
        $yu= $charge->outcome;
       return $yu->risk_score;
    }
}
