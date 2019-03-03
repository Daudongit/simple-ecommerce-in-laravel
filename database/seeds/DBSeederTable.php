<?php

use Illuminate\Database\Seeder;

class DBSeederTable extends Seeder
{   
    private $count = [
        //'blog'=>20,
        'product'=>20,
        'slider'=>3,
        'brand'=>7,
        'category'=>7
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory('App\Models\Blog',$this->count['blog'])->create();
        factory('App\Models\Slider',$this->count['slider'])->create();
        factory('App\Models\Brand',$this->count['brand'])->create();
        //factory('App\Models\Category',$this->count['category'])->create();

        $this->others();
    }

    private function others()
    {
        $this->products();

        $this->productCategory();
    }

    private function products()
    {   
        factory('App\Models\Product',$this->count['product'])->create([
            'brand_id'=>function(){
                return rand(1,$this->count['brand']);
            }
        ]);
    }

    private function productCategory()
    {   
        $productCategory = [];

        for($i=1;$i<=$this->count['product'];$i++)
        {
            $productCategory[] = [
                'product_id'=>$i,
                'category_id'=>rand(1,$this->count['category'])
            ];

            $productCategory[] = [
                'product_id'=>$i,
                'category_id'=>rand(1,$this->count['category'])
            ];
        }

        \DB::table('category_product')->insert($productCategory);
    }


}
