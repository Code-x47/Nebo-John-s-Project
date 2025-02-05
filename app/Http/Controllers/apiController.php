<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class apiController extends Controller
{

    //LOGIN METHOD
    public function login(Request $req) {
        $req->validate([
            "email"=>"Required",
            "password"=>"Required"
        ]);

        $user = User::where("email",$req->email)->first();
        if(!$user || !Hash::check($req->password,$user->password)) {
         $error = ["Report"=>"Credential Error"];
         return response($error, 401);
        }

        $token = $user->createToken('user_token')->plainTextToken;
        $res = [
            "User"=>$user,
            "Token"=>$token
        ];
        return response($res,200);
    }
   



    //PRODUCT CREATE METHOD
    public function create_product(Request $req){
        $validator = $req->validate([
            "name"=>"Required",
            "price"=>"Required | numeric",
            "stock"=>"Required | integer | min:1"
        ]);

        Product::create($validator);
        return response()->json(['message' => 'Successfully Created Product','data'=>$validator], 201);
    }

    //READ METHOD USED TO VIEW PRODUCT
        public function view_product() {
           $product = Product::all();
           return $product;
        }

    //UPDATE PRODUCT

       public function update(Request $req,Product $product) {
          $product->name = $req->name;
          $product->price = $req->price;
          $product->stock = $req->stock;

          return $product->save();
       }


    //DELETE PRODUCT
    public function Delete(Product $product) {
      $delete = $product->delete();
      return $delete;
    }
}
