<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{   
    protected $seedersPath = __DIR__.'/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        //$this->call(ProductsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(DBSeederTable::class);

        //  $class = 'VoyagerDatabaseSeeder';
        //  if (!class_exists($class)) {
        //      require_once $this->seedersPath.$class.'.php';
        //  }
 
        //   with(new $class())->run();
    }
}
