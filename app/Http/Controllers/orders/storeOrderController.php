<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class storeOrderController extends Controller
{
  public function store(Request $request)
  {
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
  }
}
