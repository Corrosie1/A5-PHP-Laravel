<?php

namespace Tests\Unit;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RoleTest extends TestCase {
  use RefreshDatabase, WithFaker;

    // test of de role tabel over de juiste columns beschikt
    public function testRolesTableHasExpectedColumns() {
      $this->assertTrue(
        Schema::hasColumns('roles', [
          'id', 'name'
      ]), 1);
  }
    // test of een rol aan meerdere gebruikers gekoppeld kan worden
    public function testARoleBelongsToManyUsers(){
      $user = factory(User::class)->create();
      $role = factory(Role::class)->create();

      $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $role->users);
    }
}
