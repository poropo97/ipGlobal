<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Payment;
use Tests\TestCase;

class paymentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getPayment()
    {

      // crear pago
      $response = $this->postJson('/payment', ['amount' => 12.45]);
      $response->assertStatus(200);

      // crear pago error por estar sin datos
      $response = $this->postJson('/payment');
      $response->assertStatus(400);

      // recuperar pago json
      $id = Payment::first()->id;
      $response = $this->getJson("/json/payment/$id");
      $response->assertStatus(200);

      // recuperar el pago html
      $response = $this->get("/payment/$id");
      $response->assertSuccessful(200);
      $response->assertViewIs('payment');

      // error al recuperar pago inexistente
      $response = $this->get("/payment/0");
      $response->assertStatus(500);

    }
}
