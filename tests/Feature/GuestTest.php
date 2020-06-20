<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class GuestTest extends TestCase {
  use RefreshDatabase;

    // test of de route werkt naar behoren
    public function testGuestPage(){
      $response = $this->get(route('guest'));
      $response->assertStatus(200);
    }

    // test of de search engine aanwezig is
    public function testGuestSearchEngineUnauthenticated(){
      $response = $this->get(route('guest'));
      $response->assertSeeText("Search");
      $response->assertSee("Zoek...");
    }

    // test of een ingelogde user de route guest niet kan zien en
    public function testGuestRouteAuthenticated(){
      $user = factory(User::class)->make();
      $response = $this->actingAs($user)->get(route('guest'));
      $response->assertStatus(302);
      $response->assertRedirect(route('home'));
    }
}


//
