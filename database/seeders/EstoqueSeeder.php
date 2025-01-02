<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estoques')->insert([
            'user_id' => 1,
            'produto_id' => 1,
            'operacao' => 'venda',
            'quantidade' => 1,
            'quantidade_min'=>1,
            'motivo' => 'ok',
        ]);
    }
}
