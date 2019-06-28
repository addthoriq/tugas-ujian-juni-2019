<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data   = [
            'id'              => 1,
            'name'            => 'Novel',
            'created_at'      => now(),
            'updated_at'      => now(),
        ];
        DB::table('categories')->truncate();
        DB::table('categories')->insert($data);
    }
}
