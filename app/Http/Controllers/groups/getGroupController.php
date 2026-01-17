<?php

namespace App\Http\Controllers\groups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class getGroupController extends Controller
{
  public function get()
  {
    $users = DB::table('users')
      ->Join('order', 'users.id', '=', 'order.user_id')
      ->select('name', 
      DB::raw("CONCAT('" . asset('images') . "/', users.img) AS img"), 'price', 'baid')
      ->get();

    return response()->json($users);

  }
}
