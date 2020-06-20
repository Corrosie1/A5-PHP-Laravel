<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase {
    use RefreshDatabase;
    // test of de login page de juiste status code terug geeft
    public function testRouteLoginPage(){
        $response = $this->get(route('login'));
        $response->assertStatus(200);
    }

    // test of de redirect goed is, zoja of de status code 302 naar voren toe komt & of de route 'login' naar behoren werkt
    public function testGuestUserIsRedirected(){
        $response = array(
              $this->get(route('home')),
              $this->get(route('epk.index')),
              $this->get(route('epk.create')),
              $this->get(route('epk.destroy', 1)),
              $this->get(route('epk.show', 1)),
              $this->get(route('epk.update', 1)),
              $this->get(route('epk.edit', 1)),
              $this->get(route('admin.users.index'))
            );
        for ($route=0; $route < count($response) ; $route++) {
          $response[$route]->assertStatus(302);
          $response[$route]->assertRedirect(route('login'));
        }
    }

    // Test of de user de loginform kan zien
    public function testUserCanViewALoginForm(){
       $response = $this->get(route('login'));

       $response->assertSuccessful();
       $response->assertViewIs('auth.login');
    }

    // Test of de user de loginform niet kan zien wanneer hij/zij ingelogd is
    public function testUserCannotViewALoginFormWhenLoggedIn(){
      $user = factory(User::class)->make();
      $response = $this->actingAs($user)->get(route('login'));
      $response->assertRedirect(route('home'));
    }

    // test of de user kan inloggen met de juiste gegevens
    public function testUserCanLoginWithCorrectCredentials(){
      $user = factory(User::class)->create([
            'password' => bcrypt($password = 'testPassword'),
        ]);

      $response = $this->post(route('login'), [
          'email' => $user->email,
          'password' => $password,
      ]);

      $response->assertRedirect(route('home'));
      $this->assertAuthenticatedAs($user);
    }

    // test of de user kan inloggen met ongeldige gegevens
    public function testUserCannotLoginInWithIncorrectCredentials(){
      $user = factory(User::class)->create([
            'password' => bcrypt('goed-wachtwoord'),
        ]);

        $response = $this->from(route('login'))->post('/login', [
            'email' => $user->email,
            'password' => 'fout-wachtwoord',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
