<?php

namespace App\Http\Controllers\groups;

use App\Http\Controllers\Controller;
use App\Jobs\GetGroupOrders;
use Illuminate\Http\Request;
use DB;

class getGroupController extends Controller
{
  public function checkAdmin($id) {
    $flagGroupId = DB::table("groups")->where("admin_id", $id)->get('id')->isNotEmpty();

    if ($flagGroupId) {
      $groupId = DB::table("groups")->where("admin_id", $id)->get('id')[0]->id;
      $flag = DB::table("users")->where("id", $id)->where("group_id", $groupId)->exists();
    } else {
      $flag = false;
    }


    $group_id = DB::table('users')->where('id', $id)->get(['group_id'])[0]->group_id;

    $groupName = DB::table('groups')->where('id', $group_id)->select(['name'])->get();

    return response()->json(["flag" => $flag, "name" => $groupName[0]->name]);
  }

  public function get($groupId)
  {
    $users = dispatch_sync(new GetGroupOrders($groupId));
    return response()->json($users);
  }

  public function setBox($groupId) {
    $date = now();

    $id = DB::table("box_orders")->insertGetId(["date" => $date->locale("ar")->translatedFormat("l، F Y"), "group_id" => $groupId]);

    return response()->json(["id" => $id, "date" => $date->locale("ar")->translatedFormat("l، F Y")]);
  }

  public function getBoxs($groupId) {
    $boxs = DB::table("box_orders")->where('group_id', $groupId)->get();

    return response()->json($boxs);
  }
}
