<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrcamentosSeeder extends Seeder
{
    /**
     * Preenche alguns orçamentos para o teste do sistema.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orcamentos')->insert([
            'ID' => '1',
            'cliente' => 'Lara',
            'data' =>  '2022-04-15',
            'hora' => '15:30',
            'vendedor' => 'Maria',
            'valor_orcado' => '500.00',
            'descricao' => 'Trocar a bomba de água que estourou.'
        ]);

        DB::table('orcamentos')->insert([
            'ID' => '2',
            'cliente' => 'Geneva',
            'data' =>  '2021-05-21',
            'hora' => '12:00',
            'vendedor' => 'Jami',
            'valor_orcado' => '1000.00',
            'descricao' => 'Pintura.'
        ]);

        DB::table('orcamentos')->insert([
            'ID' => '3',
            'cliente' => 'Wilson',
            'data' =>  '2018-12-12',
            'hora' => '8:40',
            'vendedor' => 'Larsey',
            'valor_orcado' => '2000.00',
            'descricao' => 'Troca de bateria e conserto do freio de mão.'
        ]);

        DB::table('orcamentos')->insert([
            'ID' => '4',
            'cliente' => 'Jami',
            'data' =>  '2022-01-01',
            'hora' => '18:57',
            'vendedor' => 'Carney',
            'valor_orcado' => '180.00',
            'descricao' => 'Vistoria completa.'
        ]);
    }
}
