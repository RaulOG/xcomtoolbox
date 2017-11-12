<?php

namespace Tests\Feature\Users;

use App\User;
use Tests\TestCase;

class ViewDashboardTest extends TestCase
{
    private $user;
    private $dashboard;
    /**
     * ViewDashboardTest constructor.
     */
    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->actingAs($this->user);

        $this->dashboard = $this->get('/');
    }

    /**
     * Users are welcomed to their central officer panel
     *
     * @return void
     */
    public function test_user_can_receive_a_welcome()
    {
        $this->dashboard->assertSuccessful();
        $this->dashboard->assertSee('Welcome to the Toolbox, central officer.');
    }
    
    /**
     * Users can ask for mission assistance
     * 
     * @return void
     */
    public function test_user_has_mission_assistance_in_the_panel()
    {
        $this->dashboard->assertSee('MISSION ASSISTANCE');
    }
}
