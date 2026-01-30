<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $products = [
            // Obložené chlebíčky na svetlom pečive
            ['name' => 'Chlebíček šunka-saláma-syr', 'category' => 'Obložené chlebíčky na svetlom pečive', 'description' => 'Chlebíček s krémovou nátierkou, šunkou, salámou and syrom (1,3,7)', 'price' => 1.89, 'sort_order' => 1, 'image_path' => 'images/chlebicek_ham_salami.png'],
            ['name' => 'Chlebíček syr-orech', 'category' => 'Obložené chlebíčky na svetlom pečive', 'description' => 'Chlebíček s krémovou nátierkou, syrom and vlašským orechom (1,3,7,8)', 'price' => 1.79, 'sort_order' => 2, 'image_path' => 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Chlebíček šunka-vajíčko-zemiakový šalát', 'category' => 'Obložené chlebíčky na svetlom pečive', 'description' => 'Chlebíček so šunkou zemiakovým šalátom, krémovou nátierkou na vajíčku (1,3,7)', 'price' => 1.89, 'sort_order' => 3, 'image_path' => 'https://images.unsplash.com/photo-1509722747041-619f3817a93e?auto=format&fit=crop&w=500&q=80'],

            // Obložené chlebíčky na cereálnej veke
            ['name' => 'Cereálny chlebíček šunka-saláma', 'category' => 'Obložené chlebíčky na cereálnej veke', 'description' => 'Cereálny chlebíček s krémovou nátierkou, šunkou and salámou (1,3,6,7,11)', 'price' => 1.89, 'sort_order' => 1, 'image_path' => 'https://images.unsplash.com/photo-1475090169767-40ed8d18f67d?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Cereálny chlebíček losos', 'category' => 'Obložené chlebíčky na cereálnej veke', 'description' => 'Cereálny chlebíček s krémovou nátierkou, údeným lososom and čerstvým kôprom (1,3,4,6,7,11)', 'price' => 3.19, 'sort_order' => 2, 'image_path' => 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Cereálny chlebíček syr-cvikla', 'category' => 'Obložené chlebíčky na cereálnej veke', 'description' => 'Cereálny chlebíček s nakladanou cviklou, krémovou nátierkou, syrom, vlašským orechom and kaparami (1,3,6,7,8,11)', 'price' => 1.89, 'sort_order' => 3, 'image_path' => 'https://images.unsplash.com/photo-1475090169767-40ed8d18f67d?auto=format&fit=crop&w=500&q=80'],

            // Obložené chlebíčky na bezlepkovom pečive
            ['name' => 'Bezlepkový chlebíček šunka- saláma- syr', 'category' => 'Obložené chlebíčky na bezlepkovom pečive', 'description' => 'Bezlepkový chlebíček s maslom bezlepkovou šunkou salámou and syrom (7)', 'price' => 2.99, 'sort_order' => 1, 'image_path' => 'https://images.unsplash.com/photo-1509722747041-619f3817a93e?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Bezlepkový chlebíček syr- cvikla- orech', 'category' => 'Obložené chlebíčky na bezlepkovom pečive', 'description' => 'Bezlepkový chlebíček s maslom nakladanou cviklou and vlašským orechom (7,8)', 'price' => 2.99, 'sort_order' => 2, 'image_path' => 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?auto=format&fit=crop&w=500&q=80'],

            // Obložené croissanty
            ['name' => 'Croissant šunka-syr', 'category' => 'Obložené croissanty', 'description' => 'Obložený croissant s majonézou, šunkou, syrom, kaparami and listovým šalátom (1,3,7)', 'price' => 2.99, 'sort_order' => 1, 'image_path' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Croissant avokádo-údená šunka', 'category' => 'Obložené croissanty', 'description' => 'Obložený croissant s avokádom, údenou šunkou, cherry rajčinami and listovým šalátom (1)', 'price' => 2.99, 'sort_order' => 2, 'image_path' => 'https://images.unsplash.com/photo-1581403666504-0c58e8055c1b?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Croissant mozzarella-sušené rajčiny', 'category' => 'Obložené croissanty', 'description' => 'Obložený croissant s mozzarelou, sušenými rajčinami, medovo horčicovou nátierkou and listovým šalátom (1,7,10)', 'price' => 2.99, 'sort_order' => 3, 'image_path' => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=500&q=80'],

            // Kanapky
            ['name' => 'Kanapka údená šunka-cherry rajčina-oliva', 'category' => 'Kanapky', 'description' => 'Kanapka s krémovou nátierkou, čiernou olivou, údenou šunkou, cherry rajčinou, nakladanou uhorkou (1,3,7)', 'price' => 1.49, 'sort_order' => 1, 'image_path' => 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Kanapka nakladaná cvikla-nátierka-orech', 'category' => 'Kanapky', 'description' => 'Kanapka s nakladanou cviklou, krémovou nátierkou, vlašským orechom (1,3,7,8)', 'price' => 1.39, 'sort_order' => 2, 'image_path' => 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Kanapka mozzarela-údená šunka-sušená rajčina', 'category' => 'Kanapky', 'description' => 'Kanapka s údenou šunkou, sušenou rajčinou, mini mozzarellou, nakladanou uhorkou, krémovou nátierkou (1,3,7)', 'price' => 1.49, 'sort_order' => 3, 'image_path' => 'https://images.unsplash.com/photo-1541544741938-0af808871cc0?auto=format&fit=crop&w=500&q=80'],

            // Miniburgre a wrapy
            ['name' => 'Miniburger', 'category' => 'Miniburgre a wrapy', 'description' => 'Schwarzwaldská šunka, syr ementálového typu, listový šalát, cherry rajčinky, nakladané uhorky, kečup-majonéza (1,3,7,11)', 'price' => 2.89, 'sort_order' => 1, 'image_path' => 'https://images.unsplash.com/photo-1550547660-d9450f859349?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Wrap', 'category' => 'Miniburgre a wrapy', 'description' => 'Wrap- pšeničná tortilla, krémová nátierka, šunka, syr ementálového typu, listový šalát, šalátová uhorka, cherry rajčinky (1,3,7)', 'price' => 1.99, 'sort_order' => 2, 'image_path' => 'https://images.unsplash.com/photo-1626700051175-6818013e1d4f?auto=format&fit=crop&w=500&q=80'],

            // Tartaletky
            ['name' => 'Tartaletka karamelová', 'category' => 'Tartaletky', 'description' => 'karamelový krém typu Biscoff, drvené pistáciové alebo vlašské orechy, drobné sezónne ovocie (1,3,6,7,10)', 'price' => 0.99, 'sort_order' => 1, 'image_path' => 'https://images.unsplash.com/photo-1519915028121-7d3463d20b13?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Tartaletka pistáciová', 'category' => 'Tartaletky', 'description' => 'pistáciový krém, drvené pistáciové alebo vlašské orechy, drobné sezónne ovocie (1,3,6,7,10)', 'price' => 0.99, 'sort_order' => 2, 'image_path' => 'https://images.unsplash.com/photo-1519915028121-7d3463d20b13?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Tartaletka biela čokoláda', 'category' => 'Tartaletky', 'description' => 'krém biela čokoláda, drvené pistáciové, alebo vlašské orechy, drobné sezónne ovocie (1,3,6,7,10)', 'price' => 0.99, 'sort_order' => 3, 'image_path' => 'https://images.unsplash.com/photo-1519915028121-7d3463d20b13?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Tartaletka nenaplnená', 'category' => 'Tartaletky', 'description' => 'prázdny košík zo sladkého pečiva, priemer 4,4cm, výška 2cm, pre vlastné plnenie (1,3,6,7,10)', 'price' => 0.30, 'sort_order' => 4, 'image_path' => 'https://images.unsplash.com/photo-1519915028121-7d3463d20b13?auto=format&fit=crop&w=500&q=80'],

            // Štrúdľa
            ['name' => 'Štrúdľa makovo- višňová', 'category' => 'Štrúdľa', 'description' => 'lístkové cesto, maková plnka, višne v želé 80g (1,3)', 'price' => 1.99, 'sort_order' => 1, 'image_path' => 'https://images.unsplash.com/photo-1509365465985-25d11c17e812?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Štrúdľa makovo- jablková', 'category' => 'Štrúdľa', 'description' => 'lístkové cesto, maková plnka, jablková plnka 80g (1,3)', 'price' => 1.99, 'sort_order' => 2, 'image_path' => 'https://images.unsplash.com/photo-1509365465985-25d11c17e812?auto=format&fit=crop&w=500&q=80'],

            // Obložené misy
            ['name' => 'Miešaná misa (1600g)', 'category' => 'Obložené misy', 'description' => 'Miešaná šunková, salámová and syrová misa s orechmi, hroznom, krekrami and zeleninou (1,7,8)', 'price' => 54.00, 'sort_order' => 1, 'image_path' => 'https://images.unsplash.com/photo-1534422298391-e4f8c170db76?auto=format&fit=crop&w=500&q=80'],
            ['name' => 'Miešaná misa (1200g)', 'category' => 'Obložené misy', 'description' => 'Miešaná šunková, salámová and syrová misa s orechmi, hroznom, krekrami and zeleninou (1,7,8)', 'price' => 44.00, 'sort_order' => 2, 'image_path' => 'https://images.unsplash.com/photo-1534422298391-e4f8c170db76?auto=format&fit=crop&w=500&q=80'],

            // Plnené bagety
            ['name' => 'Bageta plnená podľa objednávky zákazníka', 'category' => 'Plnené bagety', 'description' => 'Krémová nátierka, vybratá náplň...(1,3,7)', 'price' => 0.00, 'sort_order' => 1, 'image_path' => 'https://images.unsplash.com/photo-1509722747041-619f3817a93e?auto=format&fit=crop&w=500&q=80'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
