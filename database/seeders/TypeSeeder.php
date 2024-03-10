<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Type;

//Helpers
use Illuminate\Support\Facades\Schema;





class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $allTypes = [
            'HTML',
            'Java',
            'CSS', 
            'Javascript',
            'SQL',
            'Vue',
            'Laravel',
            'PHP'
        ];

        foreach ($allTypes as $singleType){
            $type = Type::create([
                'title' => $singleType,
                'slug' => str()->slug($singleType),
            ]);
        }
    }
}
