<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    protected $categories = ['men', 'women', 'children'];
    protected $sizes = ['Small', 'Medium', 'Large', 'Extra Large'];
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
        foreach ($this->sizes as  $value) {
            Size::create(['name' => $value]);
        }
        factory(Product::class, 30)->create();
    }
}
