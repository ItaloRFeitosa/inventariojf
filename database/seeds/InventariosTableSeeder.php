<?php

use Illuminate\Database\Seeder;

class InventariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventarios')->insert([
                'name' => 'JUSMA 2019.3',
                'ano' => '2019',
                'localidade' => 9,
                'portaria' => '8080 3679',
                'data_inicio' => '2019-11-17',
                'data_fim' => '2019-12-12',
                'criado_por' => 'ma375vo',
                'obs' => 'Observação Observação Observação Observação Observação Observação Observação Observação
                Observação Observação Observação Observação Observação Observação Observação Observação Observação 
                Observação Observação Observação Observação Observação Observação Observação Observação Observação'
        ]);

        DB::table('inventarios')->insert([
            'name' => 'JUSMA 2015.1',
            'ano' => '2015',
            'localidade' => 9,
            'portaria' => '8080 3679',
            'data_inicio' => '2019-11-17',
            'data_fim' => '2019-12-12',
            'criado_por' => 'ma375vo',
            'obs' => 'Observação Observação Observação Observação Observação Observação Observação Observação
            Observação Observação Observação Observação Observação Observação Observação Observação Observação 
            Observação Observação Observação Observação Observação Observação Observação Observação Observação'
        ]);

        DB::table('inventarios')->insert([
            'name' => 'JUSMA 2020.3',
            'ano' => '2020',
            'localidade' => 9,
            'portaria' => '8080 3679',
            'data_inicio' => '2019-11-17',
            'data_fim' => '2019-12-12',
            'criado_por' => 'ma375vo',
            'obs' => 'Observação Observação Observação Observação Observação Observação Observação Observação
            Observação Observação Observação Observação Observação Observação Observação Observação Observação 
            Observação Observação Observação Observação Observação Observação Observação Observação Observação'
        ]);

        DB::table('inventarios')->insert([
            'name' => 'JUSMA 2019.1',
            'ano' => '2019',
            'localidade' => 9,
            'portaria' => '8080 3679',
            'data_inicio' => '2019-11-17',
            'data_fim' => '2019-12-12',
            'criado_por' => 'ma375vo',
            'obs' => 'Observação Observação Observação Observação Observação Observação Observação Observação
            Observação Observação Observação Observação Observação Observação Observação Observação Observação 
            Observação Observação Observação Observação Observação Observação Observação Observação Observação'
        ]);

        DB::table('inventarios')->insert([
            'name' => 'JUSMA Extra',
            'ano' => '2020',
            'localidade' => 9,
            'portaria' => '8080 3679',
            'data_inicio' => '2019-11-17',
            'data_fim' => '2019-12-12',
            'criado_por' => 'ma375vo',
            'obs' => 'Observação Observação Observação Observação Observação Observação Observação Observação
            Observação Observação Observação Observação Observação Observação Observação Observação Observação 
            Observação Observação Observação Observação Observação Observação Observação Observação Observação'
        ]);
                
    }
}
