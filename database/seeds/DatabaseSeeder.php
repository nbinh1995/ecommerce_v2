<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    protected $categories = ['new arrivals', 'men', 'women', 'children'];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        foreach ($this->categories as  $value) {
            Category::create(['name' => $value, 'slug' => Str::slug($value)]);
        }
        factory(Product::class, 30)->create();
    }
}
