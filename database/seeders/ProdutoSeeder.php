<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produtos')->insert([
            'categoria_id' => 1,
            'user_id' => 1,
            'nome' => 'Teste produto',
            'descricao' => 'Descricao produto',
            'valor' => 10,
            'quantidade' => 5,
            'quantidade_min' =>2,


        ]);


    }
}
