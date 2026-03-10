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

        if ($request->image) {
          $imageName = $request->name.$userId.".png";
          $file = $request->file("image");
          $file->move(public_path('images'), $imageName);
        } else {
          $imageName = "upload.png";
        }


    $id = DB::table("users")->insertGetId(["name" => $request->name, 'img' => $imageName]);

    return response()->json(["msg" => "تم حفظ البيانات بنجاح", "id" => $id]);
  }

  public function getUser($id, $name) {
    $flag = DB::table("users")->where("id", $id)->where("name", $name)->exists();

    $imagePath = DB::table("users")->where("id", $id)->select( ["img"])->first();

    if ($imagePath->img == "upload.png") {
      $imagePath->img = "assets/img/upload.png";
    } else {
      $imagePath->img = asset('images/'.$imagePath->img);
    }

    $imagePath->flag = $flag;

    return response()->json($imagePath);
  }
}
