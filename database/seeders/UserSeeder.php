<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        $checkAdmin= User::where('email','admin@admin.com')->first();

        if(empty($checkAdmin))
             User::create(
                [
                    'name'=>'admin',
                    'email'=>'admin@admin.com',
                    'password'=>bcrypt('admin'),
                    'email_verified_at'=> \Carbon\Carbon::now(),
                    'birth_date'=> '1995-01-21',
                ]);

    }
}
