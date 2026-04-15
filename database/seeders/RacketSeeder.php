<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Racket;

class RacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Racket::create([
        'name' => 'Athena Pink',
        'brand' => 'Amasports',
        'material_face' => 'Carbono 3K',
        'price' => 2400,
        'eva' => 'Extra Soft',
        'weight' => 320,
        'thickness_mm' => 22,
        'balance' => 25,
        'level' => 'iniciante-intermediario',
        'style' => 'conforto',
        'is_comfortable' => true,
        'power_control' => 'potencia',
        'injury_indicated' => true,
        'description' => 'Raquete confortável, sem vibração, ideal para iniciantes.'
    ]);

    Racket::create([
            'name' => 'Athena Midnight',
            'brand' => 'Amasports',
            'material_face' => 'Carbono 3K',
            'price' => 2400,
            'eva' => 'Extra Soft',
            'weight' => 320,
            'thickness_mm' => 22,
            'balance' => 25,
            'level' => 'iniciante-intermediario',
            'style' => 'conforto',
            'is_comfortable' => true,
            'power_control' => 'potencia',
            'injury_indicated' => true,
            'description' => 'Feita em carbono 3K com titânio, oferecendo alta resistência na face, sensação macia, EVA extra soft e sistemas anti-vibração.'
        ]);

        Racket::create([
            'name' => 'Medusa',
            'brand' => 'Amasports',
            'material_face' => 'Carbono CTEX 6K',
            'price' => 2700,
            'eva' => 'Dynamic',
            'weight' => 330,
            'thickness_mm' => 22,
            'balance' => 26,
            'level' => 'avancado',
            'style' => 'controle-potencia',
            'is_comfortable' => false,
            'power_control' => 'controle',
            'injury_indicated' => false,
            'description' => 'Raquete com potência e controle, trazendo inovação, fibras alongadas e toque diferenciado.'
        ]);

        Racket::create([
            'name' => 'Classic Bee',
            'brand' => 'Amasports',
            'material_face' => 'Carbono 12K Carbotex',
            'price' => 2300,
            'eva' => 'Dynamic Smart Ball Absorption',
            'weight' => 325,
            'thickness_mm' => 21,
            'balance' => 26,
            'level' => 'intermediario-avancado',
            'style' => 'controle',
            'is_comfortable' => false,
            'power_control' => 'controle',
            'injury_indicated' => false,
            'description' => 'Raquete com muito controle, usando carbono 12K triaxial e tecnologia Carbotex.'
        ]);

        Racket::create([
            'name' => 'Poison Bee',
            'brand' => 'Amasports',
            'material_face' => 'Carbono 18K Triaxial',
            'price' => 2800,
            'eva' => 'Soft',
            'weight' => 318,
            'thickness_mm' => 22,
            'balance' => 26,
            'level' => 'avancado',
            'style' => 'potencia-controle',
            'is_comfortable' => true,
            'power_control' => 'potencia',
            'injury_indicated' => true,
            'description' => 'Raquete com muita potência, bastante controle e carbono 18K triaxial.'
        ]);

        Racket::create([
            'name' => 'Proteo',
            'brand' => 'Amasports',
            'material_face' => 'Carbono 3K',
            'price' => 2200,
            'eva' => 'Pro Black',
            'weight' => 330,
            'thickness_mm' => 22,
            'balance' => 27,
            'level' => 'avancado',
            'style' => 'potencia',
            'is_comfortable' => false,
            'power_control' => 'potencia',
            'injury_indicated' => true,
            'description' => 'Raquete com percepção de potência e sistema exclusivo de autenticidade.'
        ]);

        Racket::create([
            'name' => 'Kronos',
            'brand' => 'Amasports',
            'material_face' => 'Carbono 3K',
            'price' => 2400,
            'eva' => 'Pro Metal Fusion',
            'weight' => 320,
            'thickness_mm' => 22,
            'balance' => 26,
            'level' => 'iniciante-intermediario-avancado',
            'style' => 'controle',
            'is_comfortable' => false,
            'power_control' => 'controle',
            'injury_indicated' => true,
            'description' => 'Raquete com controle, estabilidade, precisão e tecnologia ABS Gel.'
        ]);
    }
}
