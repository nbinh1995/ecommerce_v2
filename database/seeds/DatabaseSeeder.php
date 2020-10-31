<?php

use App\Admin;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\CategoryAttr;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\ProductImage;
use App\Models\Provider;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    protected $categories = ['men', 'women', 'children'];
    protected $providers = ['cod', 'payment'];
    protected $attrs = ['Colors', 'Sizes'];
    protected $colors = ['Red', 'Green', 'Blue', 'Purple'];
    protected $sizes = ['Small', 'Medium', 'Large', 'Extra Large'];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'ntqb',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'ntqb',
            'email' => 'ntqb@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => '0123123123',
            'address' => 'Hue',
        ]);

        User::create([
            'name' => 'ntqb1',
            'email' => 'ntqb1@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => '0123123123',
            'address' => 'Hue',
        ]);

        factory(User::class, 15)->create();

        foreach ($this->categories as  $category) {
            Category::create(['name' => $category, 'slug' => Str::slug($category), 'meta_title' => $category]);
        }

        $color_id = Attribute::create(['attr_name' => $this->attrs[0]]);
        $size_id = Attribute::create(['attr_name' => $this->attrs[1]]);

        foreach ($this->colors as  $color) {
            AttributeValue::create(['attr_value' => $color, 'attribute_id' => $color_id->id]);
        }

        foreach ($this->sizes as  $size) {
            AttributeValue::create(['attr_value' => $size, 'attribute_id' => $size_id->id]);
        }

        foreach ($this->providers as  $provider) {
            Provider::create(['method' => $provider]);
        }
        for ($category_id = 1; $category_id < 4; $category_id++) {
            for ($attr_id = 1; $attr_id < 3; $attr_id++) {
                CategoryAttr::create(['category_id' => $category_id, 'attribute_id' => $attr_id]);
            }
        }


        for ($i = 0; $i < 30; $i++) {
            $product =   factory(Product::class)->create();
            ProductImage::create(['product_id' => $product->id, 'path' => 'https://via.placeholder.com/350x250']);
            for ($attr_value_id = 1; $attr_value_id < 9; $attr_value_id++) {
                ProductAttr::create(['attribute_value_id' => $attr_value_id, 'product_id' => $product->id]);
            }
        }
    }
}
