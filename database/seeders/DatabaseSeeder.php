<?php

namespace Database\Seeders;

use App\Models\CouponsConfig;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    User::factory()->create(
      [
        'name' => 'Admin',
        'email' => env('ADMIN_USER', 'admin@test.com'),
        'password' => bcrypt(env('ADMIN_PASSWORD', 'password'))
      ]
    );

    CouponsConfig::create([
      'discount' => 5,
      'max_coupons' => 100
    ]);
  }
}
