<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class RegisterTest extends TestCase {
    use RefreshDatabase, WithFaker;

    // test de register route
    public function testRegisterRoute(){
      $response = $this->get(route('register'));
      $response->assertStatus(200);
    }

    // test of de juiste form-register gegevens getoond worden.
    public function testRegisterPageView(){
      $response = $this->get(route('register'));
      $response->assertSeeText('Name');
      $response->assertSeeText('E-Mail Address');
      $response->assertSeeText('Password');
      $response->assertSeeText('Confirm Password');
      $response->assertSeeText('Register');
    }

    // registreert een gebruiker en logd hier vervolgens mee in het systeem
    public function testRegisterAndAuthenticateAUser(){
      $name = $this->faker->name;
      $email = $this->faker->safeEmail;
      $password = $this->faker->password(8);

      $response = $this->post('register', [
     'name' => $name,
     'email' => $email,
     'password' => $password,
     'password_confirmation' => $password,
      ]);

      $response->assertRedirect(route('home'));

      $this->assertDatabaseHas('users', [
        'name' => $name,
        'email' => $email
      ]);
    }
}
