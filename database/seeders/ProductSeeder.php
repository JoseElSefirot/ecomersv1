<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example products data
        $products = [
            [
                'name' => 'Delineador de Ojos Intenso & Preciso ',
                'description' => '¡Define tu mirada con trazos impecables! Nuestro delineador de ojos de fórmula ultraresistente te ofrece un color intenso y un acabado mate o brillante, según tu estilo. Con su punta fina y flexible, lograrás líneas precisas, desde un delineado sutil hasta un wing perfecto.',
                'price' => 150.00,
                'image' => 'products\EYELINER.jpg',
                'stock' => 50,
                'category_id' => 1,
            ],
            [
                'name' => 'Pomada para Cejas Moldeable & Duradera ',
                'description' => '¡Cejas definidas, perfectas y on fleek  todo el día! Nuestra pomada para cejas de alta fijación te permite rellenar, dar forma y estructurar con un acabado natural o intenso, según tu estilo. Su fórmula cremosa y pigmentada se adhiere sin grumos y se mezcla fácilmente para un look impecable.',
                'price' => 200.00,
                'image' => 'products\EYEBROW_PENCIL_BROWN.jpg',
                'stock' => 30,
                'category_id' => 2,
            ],
            [
                'name' => 'Sombra para Ojos de Alta Pigmentación – Colores Intensos, Miradas Inolvidables',
                'description' => 'Transforma tu mirada con nuestras sombras para ojos de textura sedosa y colores vibrantes. Su fórmula altamente pigmentada y de larga duración se difumina fácilmente, permitiendo crear desde looks suaves y naturales hasta estilos intensos y dramáticos. Disponibles en acabados mate, satinados y metálicos, son perfectas para combinar, mezclar y experimentar sin límites. Ideal para uso diario o para ocasiones especiales.',
                'price' => 200.00,
                'image' => 'products\DUO_BEACH003.jpg',
                'stock' => 30,
                'category_id' => 2,
            ],
            [
                'name' => 'Contorno en Polvo – Esculpe y Define tu Rostro con Naturalidad',
                'description' => 'Realza tus facciones con nuestro contorno en polvo de textura suave y fácil de difuminar. Su fórmula pigmentada pero modulable permite crear sombras naturales que esculpen el rostro, afinan los rasgos y aportan profundidad. Ideal para todo tipo de piel, se integra perfectamente con la base y el rubor, dejando un acabado profesional y duradero. Disponible en tonos fríos y neutros para adaptarse a diferentes subtonos de piel.',
                'price' => 200.00,
                'image' => 'products\DUO_BEACH003.jpg',
                'stock' => 30,
                'category_id' => 2,
            ],
            [
                'name' => 'Sombra para Ojos de Alta Pigmentación – Colores Intensos, Miradas Inolvidables',
                'description' => 'Transforma tu mirada con nuestras sombras para ojos de textura sedosa y colores vibrantes. Su fórmula altamente pigmentada y de larga duración se difumina fácilmente, permitiendo crear desde looks suaves y naturales hasta estilos intensos y dramáticos. Disponibles en acabados mate, satinados y metálicos, son perfectas para combinar, mezclar y experimentar sin límites. Ideal para uso diario o para ocasiones especiales.',
                'price' => 200.00,
                'image' => 'products\BLUSHING_ORGASM.jpg',
                'stock' => 30,
                'category_id' => 2,
            ],
            [
                'name' => 'Delineador de Labios Oh My Lips – Define, Perfila y Potencia tu Sonrisa',
                'description' => 'Resalta la forma natural de tus labios con nuestro delineador de alta precisión. Su textura cremosa y de larga duración permite un trazo suave y definido, ideal para contornear, rellenar o prolongar la duración del labial. Evita que el color se corra y crea un acabado impecable en cada aplicación. Disponible en tonos que combinan perfectamente con tus labiales favoritos.',
                'price' => 200.00,
                'image' => 'products\EYELINER.jpg',
                'stock' => 30,
                'category_id' => 2,
            ],
            [
                'name' => 'Brillo Labial Ultra Brillante – Labios Jugosos con Efecto Volumen',
                'description' => 'Dale a tus labios un toque irresistible con nuestro brillo labial de acabado luminoso. Su fórmula ligera y no pegajosa aporta hidratación y un efecto de volumen instantáneo, dejando los labios suaves, radiantes y visiblemente más llenos. Perfecto para usar solo o sobre tu labial favorito, está disponible en tonos transparentes y con color para adaptarse a cada look.',
                'price' => 200.00,
                'image' => 'products\OH_MY_LIPS_1.jpg',
                'stock' => 30,
                'category_id' => 2,
            ],
            // Add more products as needed
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
                'stock' => $product['stock'],
                'category_id' => $product['category_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
