<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TelefonosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('telefonos')->insert([

            [
                'modelo' => 'iPhone 14 Pro Max',
                'marca' => 'Apple',
                'precio' => 5899.00,
                'stock' => 10,
                'descripcion' => 'Pantalla OLED 6.7", A16 Bionic, 256GB.',
                'imagen' => 'https://via.placeholder.com/300x300?text=iPhone+14+Pro+Max',
            ],
            [
                'modelo' => 'iPhone 13',
                'marca' => 'Apple',
                'precio' => 3599.00,
                'stock' => 15,
                'descripcion' => 'iPhone 13 con 128GB y cámara dual.',
                'imagen' => 'https://mac-center.com.pe/cdn/shop/files/iPhone_13_Midnight_PDP_Image_position-1A__CLCO_v1_83f068d3-1619-4e81-8f3a-cfb7d7ff73af.jpg?v=1700286900&width=823',
            ],
            [
                'modelo' => 'Samsung Galaxy S23 Ultra',
                'marca' => 'Samsung',
                'precio' => 4899.00,
                'stock' => 12,
                'descripcion' => 'Pantalla 6.8", 200MP, Snapdragon 8 Gen 2.',
                'imagen' => 'https://peruimporta.com/wp-content/uploads/2023/04/Galaxy-S23-ultra-lima.jpg',
            ],
            [
                'modelo' => 'Samsung Galaxy A54',
                'marca' => 'Samsung',
                'precio' => 1499.00,
                'stock' => 20,
                'descripcion' => 'Pantalla AMOLED 6.4”, 128GB, 50MP.',
                'imagen' => 'https://i5.walmartimages.com/seo/Samsung-Galaxy-A54-Dual-SIM-128GB-ROM-8GB-RAM-Only-GSM-No-CDMA-Factory-Unlocked-5G-Smartphone-Awesome-Black-International-Version_d00d1d3d-9d92-4ce2-9204-6d3f64b311be.86092b55bcf9ef12ec28aa981cf61db7.jpeg',
            ],
            [
                'modelo' => 'Xiaomi Redmi Note 12',
                'marca' => 'Xiaomi',
                'precio' => 899.00,
                'stock' => 30,
                'descripcion' => '128GB, pantalla AMOLED 120Hz, 5000mAh.',
                'imagen' => 'https://oechsle.vteximg.com.br/arquivos/ids/16995534-1000-1000/image-5988de8118d64ab5ac630689d5a1d5fd.jpg?v=638378733351570000',
            ],
            [
                'modelo' => 'Xiaomi Poco X5 Pro',
                'marca' => 'Xiaomi',
                'precio' => 1199.00,
                'stock' => 18,
                'descripcion' => 'Snapdragon 778G, 6.67", 108MP.',
                'imagen' => 'https://www.peru-smart.com/wp-content/uploads/2023/08/CELU558NEGRO-256GB.jpg',
            ],
            [
                'modelo' => 'Motorola Edge 30 Ultra',
                'marca' => 'Motorola',
                'precio' => 2699.00,
                'stock' => 11,
                'descripcion' => '200MP, Snapdragon 8+ Gen 1, 12GB RAM.',
                'imagen' => 'https://via.placeholder.com/300x300?text=Edge+30+Ultra',
            ],
            [
                'modelo' => 'Motorola Moto G82',
                'marca' => 'Motorola',
                'precio' => 999.00,
                'stock' => 25,
                'descripcion' => 'AMOLED 120Hz, 50MP OIS, 5000mAh.',
                'imagen' => 'https://smartphonesperu.pe/wp-content/uploads/2024/05/Motorola-Moto-G82-128GB-6GB-Smartphones-peru-venta-de-celulares-y-especialistas-en-servicio-tecnico-y-accesorios.png',
            ],
            [
                'modelo' => 'Huawei P50 Pro',
                'marca' => 'Huawei',
                'precio' => 3799.00,
                'stock' => 9,
                'descripcion' => 'Pantalla curva, 50MP, 120Hz.',
                'imagen' => 'https://www.peru-smart.com/wp-content/uploads/2023/08/CELU609NEGRO-256GB.jpg',
            ],
            [
                'modelo' => 'Oppo Reno 8',
                'marca' => 'Oppo',
                'precio' => 1799.00,
                'stock' => 16,
                'descripcion' => '50MP, 80W carga rápida, 8GB RAM.',
                'imagen' => 'https://i5.walmartimages.com/seo/OPPO-Reno-8-DUAL-SIM-256GB-ROM-8GB-RAM-GSM-ONLY-NO-CDMA-Factory-Unlocked-5G-Smartphone-Shimmer-Black-International-Version_94172962-54c2-47a3-8819-2dd16b5b320a.464b2ade477ffa9b3c7a9df5db11ea10.jpeg',
            ],

        ]);
    }
}
