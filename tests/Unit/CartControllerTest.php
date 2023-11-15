<?php

namespace Tests\Feature;

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartControllerTest extends TestCase
{

    public function testAddProductToCart()
    {
        // Prepare the session environment
        Session::start();
        Session::put('products', []);

        //Prepare request data
        $productId = 1; // use an existent id in the database
        $quantity = 1;

        // Make the request
        $response = $this->post('/cart/add/'.$productId, ['quantity' => $quantity]);

        // Make sure the product has been added to the session
        $this->assertEquals($quantity, Session::get("products.$productId"));

        // Check the answer
        $response->assertRedirect(route('cart.index'));
    }
}
