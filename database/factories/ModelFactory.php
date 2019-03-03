<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Blog::class, function (Faker\Generator $faker) {
    $title = $faker->unique()->bs;
    return [
        'title' => $title,
        'slug'=>str_slug($title),
        'content' => $faker->paragraph(4),
    ];
});

$factory->define(App\Models\Brand::class, function (Faker\Generator $faker) {
    $title = $faker->unique()->bs;
    return [
        'name' => $faker->unique()->word,
        'slug'=>str_slug($title),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    $title = $faker->unique()->bs;
    return [
        'name' => $faker->word,
        'slug'=>str_slug($title),
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    $name = $faker->unique()->bs;
    $gallery = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    return [
        'name' => $name,
        'slug'=>str_slug($name),
        'details' => $faker->bs,
        'price'=>$faker->numberBetween(1000,20000),
        'brand_id'=>function(){
            return factory('App\Models\Brand')->create()->id;
        },
        'view_count'=>$faker->numberBetween(10,50),
        'status'=>$faker->numberBetween(0,2),
        'description'=>$faker->paragraph(2),
        'featured'=>$faker->boolean,
        'quantity'=>$faker->numberBetween(10,20),
		'image'=>$faker->randomElement($gallery),
        'images'=>$faker->randomElements($gallery,$faker->numberBetween(2,4)),
    ];
});


$factory->define(App\Models\Slider::class, function (Faker\Generator $faker){
	$gallery =[
		'1',
		'2',
		'3',
	];

	return [
		'title'=>$faker->sentence(2),
		'sub_title'=>$faker->bs,
		'status'=>1,
		'image'=>$faker->randomElement($gallery),
		'description'=>$faker->sentence,
	];
});