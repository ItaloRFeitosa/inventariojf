<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::connection('mysql')->table('teste')->insert(
            [
                'nome' => 'João'
            ]
        );
        DB::connection('mysql')->table('teste')->insert(
            [
                'nome' => 'Pedro'
            ]
        );
    }
}
