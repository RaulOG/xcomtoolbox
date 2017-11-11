<?php

namespace Tests\Feature\Pods;

use App\Pod;
use App\User;
use Tests\TestCase;

class ViewPodsTest extends TestCase
{
    /**
     * User can see his empty pods overview
     *
     * @return void
     */
    public function test_user_can_see_his_empty_pods_overview()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get('/pods');

        $response->assertSuccessful();
        $response->assertSee('No pods');
    }

    /**
     * User can see one pod
     *
     * @return void
     */
    public function test_user_can_see_one_pod()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        factory(Pod::class)->create(['user_id'=> $user->id]);

        $response = $this->get('/pods');

        $response->assertSuccessful();
        $response->assertSee('1 pod');
    }

    /**
     * User can see multiple pods
     *
     * @return void
     */
    public function test_user_can_see_multiple_pods()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        factory(Pod::class, 5)->create(['user_id'=> $user->id]);

        $response = $this->get('/pods');

        $response->assertSuccessful();
        $response->assertSee('5 pods');
    }
}
