<?php

namespace App\Http\Controllers\groups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class getGroupController extends Controller
{
<<<<<<< HEAD
  public function get()
  {
    $users = DB::table('users')
      ->Join('order', 'users.id', '=', 'order.user_id')
      ->select('name', 
      DB::raw("CONCAT('" . asset('images') . "/', users.img) AS img"), 'price', 'baid')
=======
  public function checkAdmin($id) {
    $flag = DB::table("groups")->where("admin_id", $id)->exists();

    $group_id = DB::table('users')->where('id', $id)->get(['group_id'])[0]->group_id;

    $groupName = DB::table('groups')->where('id', $group_id)->select(['name'])->get();

    return response()->json(["flag" => $flag, "name" => $groupName[0]->name]);
  }

  public function get($groupId)
  {
    $users = DB::table('users')
      ->Join('order', 'users.id', '=', 'order.user_id')
      ->where('order.group_id', $groupId)
      ->select('order.id', 'name', 
      DB::raw("CONCAT('" . asset('images') . "/', users.img) AS img"), 'price', 'baid', 'box_id')
>>>>>>> ebf1a3b (Initial commit)
      ->get();

    return response()->json($users);

  }
<<<<<<< HEAD
=======

  public function setBox($groupId) {
    $date = now();

    $id = DB::table("box_orders")->insertGetId(["date" => $date->locale("ar")->translatedFormat("l، F Y"), "group_id" => $groupId]);

    return response()->json(["id" => $id, "date" => $date->locale("ar")->translatedFormat("l، F Y")]);
  }

  public function getBoxs($groupId) {
    $boxs = DB::table("box_orders")->where('group_id', $groupId)->get();

    return response()->json($boxs);
  }
>>>>>>> ebf1a3b (Initial commit)
}
