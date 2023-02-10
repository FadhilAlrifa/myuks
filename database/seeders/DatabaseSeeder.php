<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Hospital;
use App\Models\Medicine;
use App\Models\MedicineCategory;
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
        \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Article::factory(17)->create();

        $articleCategory = [
            "Kesehatan",
            "Mental dan psikis",
            "Makanan",
            "Olahraga",
            "Gaya Hidup",
            "Lainnya"
        ];

        for ($i = 0; $i < count($articleCategory); $i++) {
            ArticleCategory::create([
                "name" => $articleCategory[$i],
                "slug" => strtolower(str_replace(" ", "-", $articleCategory[$i])),
            ]);
        }




        // Medicine::factory(20)->create();

        $medicineCategory = [
            "Demam",
            "Sakit Kepala",
            "Gangguan Pencernaan",
            "Nyeri",
            "Gangguan Kulit",
            "Gangguan Pernapasan",
            "Lainnya",
        ];

        for ($i = 0; $i < count($medicineCategory); $i++) {
            MedicineCategory::create([
                "name" => $medicineCategory[$i],
                "slug" => strtolower(str_replace(" ", "-", $medicineCategory[$i])),
            ]);
        }




        // Hospital::factory(8)->create();
    }
}
