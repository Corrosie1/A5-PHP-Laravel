<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Epk;

class EpkSearchTest extends TestCase {

  use RefreshDatabase;

    // test of de search engine van de "guest" page naar behoren werkt.
    public function testSearchEpk(){
      factory(Epk::class, 5)->create();
      $all = Epk::all();
      $randomTitel = Epk::all()->first()->titel;
      $randomBiografie = Epk::all()->first()->biografie;
      $randomYoutubeId = Epk::all()->first()->youtubeId;
      #
      $response = $this->get(route('guest').'?keyword='. $randomTitel);
      $response->assertSeeText($randomTitel);
      $response->assertSeeText($randomBiografie);
      $response->assertSeeText($randomYoutubeId);
      $response->assertDontSeeText($all);
    }
}
