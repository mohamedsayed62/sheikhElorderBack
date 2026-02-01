<?php

namespace App\Http\Controllers\groups;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class storeGroupController extends Controller
{
  public function store(Request $request) {
    $request->validate(
      [
        'name' => 'required|min:1|max:40',
        'key' => 'required|size:6|unique:groups'
      ],
      [
        'key.size' => 'لازم الكود مكون من 6 حروف',
        'key.unique' => 'هذا الكود مستخدم'
      ]
    );
<<<<<<< HEAD
    $id = DB::table("groups")->insertGetId($request->all());
    
    DB::table('users')
  ->where('id', $request->admin_id)
  ->update([
      'group_id' => $id
  ]);

    return response()->json(['msg' => 'تمت الاضافة']);
=======

    $id = DB::table("groups")->insertGetId($request->all());

    DB::table('users')
    ->where('id', $request->admin_id)
    ->update([
        'group_id' => $id
    ]);

    return response()->json(['group_id' => $id]);
>>>>>>> ebf1a3b (Initial commit)
  }
}
