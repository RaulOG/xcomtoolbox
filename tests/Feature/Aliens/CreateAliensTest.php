<?php

namespace Tests\Feature\Aliens;

use App\Pod;
use App\User;
use Tests\TestCase;

class CreateAliensTest extends TestCase
{
    /**
     * User can create an alien
     *
     * @return void
     */
    public function test_user_can_create_an_alien()
    {
        $user = factory(User::class)->create();
        $pod = factory(Pod::class)->make();
        $user->pods()->save($pod);
        $this->actingAs($user);

        $this->post('/aliens', ['pod_id' => $pod->id]);

        $this->assertEquals(1, $pod->aliens()->count());
    }
}
