<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Auth;

use App\Event;

class VirtualTest extends TestCase
{
    use DatabaseTransactions;
    /**
     *
     * @test
     */
    public function if_the_homepage_has_a_map()
    {
        $this->visit('/')
             ->see('map-canvas');
    }

     /**
     *
     * @test
     */
    public function if_the_eventpage_has_a_virtual_map()
    {
        $this->visit('/event/1')
             ->see('mapplic');
    }

    /**
     *
     * @test
     */
    public function if_the_register_page()
    {
        $this->visit('/register')
             ->see('registerUser()');
    }

    /**
     *
     * @test
     */
    public function if_the_login_page()
    {
        $this->visit('/login')
             ->see('Remember Me');
    }

    /**
     *
     * @test
     */
    public function if_creating_an_event_is_restricted_to_admin()
    {
        
        if(!empty(Auth::user()->admin)) {
            $this->visit('/admin/event/create')
                 ->see('login');
        }
    }

}
