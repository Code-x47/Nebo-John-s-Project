<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Support\Facades\DB;

class EcommerceController extends Controller
{

    //Create Order
    public function create_order(Request $req) {
     
      $order = new Order;
      $order->user_id =  auth()->id();
      $order->total_amount = $req->amount;
      return $order->save();
    }




// Top 5 customers by total spending
public function topCustomers(){
    $topCustomers = Order::select('user_id', DB::raw('SUM(total_amount) as total_spent'))
    ->groupBy('user_id')
    ->orderByDesc('total_spent')
    ->limit(5)
    ->get();

    return $topCustomers;
}





// Get total revenue for the current month

public function totalRevenue(){
    $totalRevenue = Order::whereMonth('created_at', Carbon::now()->month)
    ->whereYear('created_at', Carbon::now()->year)
    ->sum('total_amount');
    
    return $totalRevenue; 

}


//Create Order Items

public function create_order_items(Request $req, $id) {
    $order = Order::find($id);

    if ($order) {

    $item = new Order_Item;

    $item->order_id = $order->id;
    $item->product_id = $req->product_id;
    $item->quantity = $req->quantity;
    $item->price = $order->total_amount;
    return $item->save();

    }
    else {
        return response()->json(['message' => 'No pending order found for this user'], 404);
    }



}

// Most sold products

public function mostSoldProducts(){
    
    $mostSoldProducts = Order_Item::select('product_id', DB::raw('SUM(quantity) as total_sold'))
    ->groupBy('product_id')
    ->orderByDesc('total_sold')
    ->get();

    return $mostSoldProducts;

}






}
