<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller, DB;
use Illuminate\Http\Request;
class storeController extends Controller
{
  public function store(Request $request) {

    $request->validate([
      'name' => 'required|min:2|max:20'
    ],
  [
    'name.max' => 'أقصي عدد حروف 20'
  ]);

    $userId = DB::table("users")->latest('id')->value("id");
    $userId += 1;

    $imageName = $request->name.$userId.".png";

    $file = $request->file("image");
    $file->move(public_path('images'), $imageName);

    $id = DB::table("users")->insertGetId(["name" => $request->name, 'img' => $imageName]);

    return response()->json(["msg" => "تم حفظ البيانات بنجاح", "id" => $id]);
  }
}
