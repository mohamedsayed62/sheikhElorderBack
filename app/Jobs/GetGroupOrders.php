<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use DB;

class GetGroupOrders
{
  use Queueable;

  /**
   * Create a new job instance.
   */

  protected $group_id;
  public function __construct($groupId)
  {
    $this->group_id = $groupId;
  }

  /**
   * Execute the job.
   */
  public function handle()
  {
    $users = DB::table('users')
      ->Join('order', 'users.id', '=', 'order.user_id')
      ->where('order.group_id', $this->group_id)
      ->select('order.id', 'name', 
      'users.img', 'price', 'baid', 'box_id')
      ->get();

    foreach ($users as $user) {
      if ($user->img == "upload.png") {
        $user->img = "assets/img/upload.png";
      } else {
        $user->img = asset('images/'.$user->img);
      }
    }

    return $users;
  }
}
