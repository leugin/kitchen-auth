<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Leugin\KitchenCore\database\seeders\IngredientSeeder;
use Leugin\KitchenCore\database\seeders\RecipeSeeder;
use Leugin\KitchenCore\database\seeders\WarehouseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(IngredientSeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(WarehouseSeeder::class);

    }
}
