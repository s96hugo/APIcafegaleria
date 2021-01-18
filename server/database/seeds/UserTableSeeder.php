<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $json = File::get("database/data-sample/users.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            User::create(array(
              'id' => $obj->id,
              'name' => $obj->name,
              'email' => $obj->email,
              'password' => $obj->password
            ));
         }
        
    }
}
