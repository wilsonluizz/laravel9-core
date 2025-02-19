<?php

namespace Database\Seeders;

use App\Models\UnidadeFederativa;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadeFederativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnidadeFederativa::insert([
            ['estado' => 'Acre', 'uf' => 'AC'],
            ['estado' => 'Alagoas', 'uf' => 'AL'],
            ['estado' => 'Amapá', 'uf' => 'AP'],
            ['estado' => 'Amazonas', 'uf' => 'AM'],
            ['estado' => 'Bahia', 'uf' => 'BA'],
            ['estado' => 'Ceará', 'uf' => 'CE'],
            ['estado' => 'Distrito Federal', 'uf' => 'DF'],
            ['estado' => 'Espírito Santo', 'uf' => 'ES'],
            ['estado' => 'Goiás', 'uf' => 'GO'],
            ['estado' => 'Maranhão', 'uf' => 'MA'],
            ['estado' => 'Mato Grosso', 'uf' => 'MT'],
            ['estado' => 'Mato Grosso do Sul', 'uf' => 'MS'],
            ['estado' => 'Minas Gerais', 'uf' => 'MG'],
            ['estado' => 'Pará', 'uf' => 'PA'],
            ['estado' => 'Paraíba ', 'uf' => 'PB'],
            ['estado' => 'Paraná', 'uf' => 'PR'],
            ['estado' => 'Pernambuco', 'uf' => 'PE'],
            ['estado' => 'Piauí', 'uf' => 'PI'],
            ['estado' => 'Rio de Janeiro', 'uf' => 'RJ'],
            ['estado' => 'Rio Grande do Norte', 'uf' => 'RN'],
            ['estado' => 'Rio Grande do Sul ', 'uf' => 'RS'],
            ['estado' => 'Rondônia', 'uf' => 'RO'],
            ['estado' => 'Roraima', 'uf' => 'RR'],
            ['estado' => 'Santa Catarina ', 'uf' => 'SC'],
            ['estado' => 'São Paulo ', 'uf' => 'SP'],
            ['estado' => 'Sergipe', 'uf' => 'SE'],
            ['estado' => 'Tocantins', 'uf' => 'TO'],
        ]);
    }
}
