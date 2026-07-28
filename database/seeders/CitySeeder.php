<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = State::all();
        $now = now();
        
        foreach ($states as $state) {
            $response = Http::timeout(120)
                ->connectTimeout(60)
                ->retry(3, 1000)
                ->get("https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$state->uf}/municipios");
            
            if ($response->successful()) {
                $cities = $response->json();
                $data = [];
                
                foreach ($cities as $city) {
                    $data[] = [
                        'name' => $city['nome'],
                        'state_id' => $state->id,
                        'status' => true,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
                
                $chunks = array_chunk($data, 500);
                foreach ($chunks as $chunk) {
                    City::insert($chunk);
                }
            }
        }
    }
}
