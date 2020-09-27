<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    protected $categories = ['Men', 'Women', 'Children'];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        foreach ($this->categories as  $value) {
            Category::create(['name' => $value]);
        }
        factory(Product::class, 20)->create();
    }
}
