<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class storeOrderController extends Controller
{
  public function store(Request $request)
  {
<<<<<<< HEAD
    foreach ($request->all() as $value) {
      if (sizeof($value) == 3) {
        $id = DB::table("order")->insertGetId($value);
      }
    }

    foreach ($request->all() as $value) {
      if (sizeof($value) == 4) {
        $value += ["order_id" => $id];
        $id = DB::table("categories")->insert($value);
      }
    }
=======
    foreach ($request->all() as $key => $value) {
      if ($key == count($request->all())- 1) {
        $id = DB::table("order")->insertGetId($value);
      }
    }
    foreach ($request->all() as $key => $value) {
      if ($key != count($request->all())- 1) {
        $value += ["order_id" => $id];
        DB::table("categories")->insert($value);
      }
    }

  }

  public function get($id) {
    $categories = DB::table("categories")->where('order.box_id', $id)->select(['name', 'amount'])
      ->join('order', 'order.id', '=', 'categories.order_id')
      ->get();
    ;

    return response()->json($categories);
  }

  public function show($id) {
    $categories = DB::table("categories")->where("order_id", $id)->get();

    return response()->json($categories);
>>>>>>> ebf1a3b (Initial commit)
  }
}
