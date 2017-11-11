<?php

namespace Tests\Feature\Aliens;

use App\Alien;
use App\Pod;
use App\User;
use Tests\TestCase;

class DestroyAliensTest extends TestCase
{
    /**
     * User can create an alien
     *
     * @return void
     */
    public function test_user_can_destroy_an_alien()
    {
        $user = factory(User::class)->create();
        $pod = factory(Pod::class)->make();
        $user->pods()->save($pod);
        $alien = factory(Alien::class)->make();
        $pod->aliens()->save($alien);
        $this->actingAs($user);

        $response = $this->delete('/aliens/'.$alien->id);

        $this->assertEquals(0, $pod->aliens->count());
    }
}
