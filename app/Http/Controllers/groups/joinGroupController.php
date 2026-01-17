<?php

namespace App\Http\Controllers\groups;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class joinGroupController extends Controller
{
  public function join($key, $id) {
    if (DB::table("groups")->where("key", $key)->exists()) {
      $groupId = DB::table("groups")->where("key", $key)->select(["id"])->get();
      DB::table("users")->where("id", $id)->update(["group_id" => $groupId[0]->id]);
    }
  }
}
