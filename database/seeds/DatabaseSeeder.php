<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\User;
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
        User::create([
            'name' => 'ntqb',
            'email' => 'ntqb@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => '0123123123',
            'address' => 'Hue',
            'is_admin' => 1
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
