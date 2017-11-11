<?php

namespace Tests\Feature\Pods;

use App\Pod;
use App\User;
use Tests\TestCase;

class DestroyPodsTest extends TestCase
{
    /**
     * User can destroy a pod
     *
     * @return void
     */
    public function test_user_can_destroy_a_pod()
    {
        $user = factory(User::class)->create();
        $pod = factory(Pod::class)->make();
        $user->pods()->save($pod);
        $this->actingAs($user);

        $this->delete('/pods/'.$pod->id);

        $this->assertEquals(0, $user->pods->count());
    }
}
