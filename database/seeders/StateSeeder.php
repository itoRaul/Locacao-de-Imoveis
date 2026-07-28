<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use Illuminate\Support\Facades\Http;

class StateSeeder extends Seeder
{
    public function run() : void
    {
        $response = Http::timeout(120)
            ->connectTimeout(60)
            ->retry(3, 1000)
            ->get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        
        if ($response->successful()) {
            $states = $response->json();
            $data = [];
            $now = now();
            
            foreach ($states as $state) {
                $data[] = [
                    'name' => $state['nome'],
                    'uf' => $state['sigla'],
                    'status' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            
            State::insert($data);
        }
    }
}