<?php

namespace Tests\Unit;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    // test of een user meerdere rollen kan hebben
    public function testAuserBelongsToManyRoles()
    {
        $user = factory(User::class)->create();
        $role = factory(Role::class)->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->roles);
    }
}
