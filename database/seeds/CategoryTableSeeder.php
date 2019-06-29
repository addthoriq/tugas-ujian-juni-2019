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
            [
                'id'              => 1,
                'name'            => 'Novel',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 2,
                'name'            => 'Agama',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 3,
                'name'            => 'Komik',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 4,
                'name'            => 'Majalah',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 5,
                'name'            => 'Koran',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 6,
                'name'            => 'Sejarah',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 7,
                'name'            => 'Pelajaran',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 8,
                'name'            => 'Cerita anak-anak',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 9,
                'name'            => 'Cerita Remaja',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 10,
                'name'            => 'Cerita Pendek',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 11,
                'name'            => 'Cerita Islami',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 12,
                'name'            => 'Karya Ilmiah',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 13,
                'name'            => 'Karya Ilmiah Remaja',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 14,
                'name'            => 'Puisi dan Sastra',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 15,
                'name'            => 'Bahasa Asing',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 16,
                'name'            => 'Bahasa Daerah',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 17,
                'name'            => 'Cerita Rakyat',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 18,
                'name'            => 'Musik',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 19,
                'name'            => 'Memasak',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id'              => 20,
                'name'            => 'Komputer dan Teknologi',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ];
        DB::table('categories')->truncate();
        DB::table('categories')->insert($data);
    }
}
