<?php

namespace Tests\Feature\Pods;

use App\User;
use Tests\TestCase;

class CreatePodsTest extends TestCase
{
    /**
     * User can create a pod
     *
     * @return void
     */
    public function test_user_can_create_a_pod()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->post('/pods');
        $this->post('/pods');
        $this->post('/pods');

        $this->assertEquals(3, $user->pods->count());
    }
}
