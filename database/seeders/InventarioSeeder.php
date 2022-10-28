<?php

namespace Database\Seeders;

use App\Models\Atividade;
use App\Models\Categoria;
use App\Models\CentroDeCusto;
use App\Models\Localidade;
use App\Models\Marca;
use App\Models\NotaFiscal;
use App\Models\Responsavel;
use App\Models\Tipo;
use App\Models\TipoMovimentacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        Responsavel::create([
            'nome'            =>  'Wilson Luiz',
            'matricula'       =>  '102637',
            'email'           =>  'wilson.santos@hsl.org.br',
        ]);
        Responsavel::create([
            'nome'            =>  'Bruno Guariroba',
            'matricula'       =>  '19227',
            'email'           =>  'bruno.adguariroba@hsl.org.br',
        ]);

        Localidade::create([
            'nome'            => 'Núcleo São Paulo',
            'cidade'          => 'São Paulo',
            'cep'             => '1308000',
            'uf_id'           => 25,
            'created_at'      => date(now()),
            'updated_at'      =>date(now()),
        ]);
        Localidade::create([
            'nome'            => 'Núcleo BSB',
            'cidade'          => 'Brasília',
            'cep'             => '1308000',
            'uf_id'           => 7,
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        CentroDeCusto::create([
            'nome'            =>  'TeleUTI',
            'codigo'          =>  '633',
            'responsavel_id'       =>  1
        ]);
        CentroDeCusto::create([
            'nome'            =>  'TeleNordeste',
            'codigo'          =>  '634',
            'responsavel_id'  =>  1,
        ]);

        Tipo::create([
            'tipo'            => 'Ativo',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Tipo::create([
            'tipo'            => 'Material de consumo',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        Categoria::create([
            'categoria'       => 'Informática',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Categoria::create([
            'categoria'       => 'Eletrônicos',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Categoria::create([
            'categoria'       => 'Telefonia',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        Marca::create([
            'marca'           => 'DELL',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Marca::create([
            'marca'           => 'SANSUNG',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Marca::create([
            'marca'           => 'LENOVO',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Marca::create([
            'marca'           => 'ASUS',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Marca::create([
            'marca'           => 'MOTOROLA',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Marca::create([
            'marca'           => 'APPLE',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        NotaFiscal::create([
            'numero'          => '12345678910',
            'valor'           => '400',
            'sc_origem'       => 'hfsidufhsd',
            'data_emissao'    => date(now()),
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        NotaFiscal::create([
            'numero'          => '109876543210',
            'valor'           => '600',
            'sc_origem'       => 'hdhjjgfdsa',
            'data_emissao'    =>  date(now()),
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);

        TipoMovimentacao::create([
            'tipo'            => 'Entrega ao coladorador',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        TipoMovimentacao::create([
            'tipo'            => 'Devolução do coladorador',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        TipoMovimentacao::create([
            'tipo'            => 'Entrega ao suporte para manutenção',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        TipoMovimentacao::create([
            'tipo'            => 'Devolução ao colaborador após manutenção',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        
        Atividade::create([
            'atividade'      => 'Criação',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Atividade::create([
            'atividade'      => 'Edição',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
        Atividade::create([
            'atividade'      => 'Exclusão',
            'created_at'      => date(now()),
            'updated_at'      => date(now()),
        ]);
    }
}

