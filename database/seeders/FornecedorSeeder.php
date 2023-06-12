<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor Seed';
        $fornecedor->UF = 'PR';
        $fornecedor->email = 'seed@fornecedor.com.br';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Fornecedor2 Seed',
            'UF' => 'CE',
            'email' => 'fornecedor2seed@fornecedor.com.br',
        ]);
    }
}
