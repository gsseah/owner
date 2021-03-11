<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //  $this->call('OwnerTableSeeder');
	DB::table('owner_details')->insert([
            'name' => 'John Doe',
            'referral_code' => 'ABC123',
        ]);

        DB::table('owner_details')->insert([
            'name' => 'Sue Chen',
            'referral_code' => 'DEF123',
        ]);

        DB::table('owner_details')->insert([
            'name' => 'Jack Doe',
            'referral_code' => 'GHI123',
        ]);
    }
}
