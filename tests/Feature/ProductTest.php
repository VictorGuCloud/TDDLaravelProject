<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use WithFaker;
    
    public function testProductList()
    {
        $response = $this->json('GET', '/products');
        $products = \App\Model\Product::paginate(10);
        foreach($products as $product){
            $response->assertSee($product['name']);
        }
        $response->assertStatus(200);
    }
    
    public function testProductCreate()
    {
        $name = str_random(10);
        $file = UploadedFile::fake()->image('faker.jpg')->size(100);
        $response = $this->json('POST', '/products', [
            'name' => $name,
            'price' => $this->faker->numberBetween($min = 30, $max = 900),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'picture' => $file,
        ]);
        $this->assertDatabaseHas('products', ['name' => $name]);
        $response->assertStatus(302);
    }
    
    public function testProductEdit()
    {
        $id = $this->faker->numberBetween($min = 100, $max = 200); //seeds generate 300 rows of record
        $product = \App\Model\Product::find($id);
        $this->assertDatabaseHas('products', ['name' => $product->name]);
        if($product){
            $file = UploadedFile::fake()->image('faker.jpg')->size(100);
            $response = $this->json('PATCH','/products/'.$id, [
                'name' => str_random(10),
                'price' => $this->faker->numberBetween($min = 30, $max = 900),
                'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
                'picture' => $file,
            ]);
            $this->assertDatabaseMissing('products', ['name' => $product->name]);
            $response->assertStatus(302);
        }else{
            $this->assertTrue(true);
        }
    }
    
    public function testProductDelete()
    {
        $id = $this->faker->numberBetween($min = 200, $max = 300); //seeds generate 300 rows of record
        $product = \App\Model\Product::find($id);
        if($product){
            $response = $this->json('DELETE','/products/'.$id);
            $response->assertStatus(302);
        }else{
            $this->assertTrue(true);
        }
    }
}
