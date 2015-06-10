<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\App;
use Mockery as m;

class UITest extends TestCase
{
    use DatabaseMigrations;

    public function testProfileAnonymous()
    {
        $this->visit('/profile')
             ->see('Remember Me');
    }

    public function should_see_sponsor_blocks()
    {
        $this->visit('/')
            ->see('Fan of the PodCast')
            ->see('1 Show a Month')
            ->see('2 Shows a Month')
            ->see('Manage Subscription');
    }

    public function testBadLogin()
    {

        $this->visit('/auth/login')
            ->type('foo@foo.com', 'email')
            ->type('adfl;ka;lsdfkals;dkf', 'password')
            ->press('Login')
            ->see("These credentials do not match our records");
    }

    public function testLogin()
    {

        $user = factory('App\User')->create(
            ['email' => 'foo2@foo.com', 'password' =>  bcrypt('foobar')]
        );

        $mock = m::mock('Illuminate\Contracts\Auth\Guard');
        $mock->shouldReceive('user')->andReturnSelf()
            ->set('email', $user->email)
            ->set('stripe_id', $user->stripe_id);
        $mock->shouldReceive('guest')->andReturn(false);
        $mock->shouldReceive('check')->andReturnSelf();
        $mock->shouldReceive('invoices')->andReturn([]);
        $mock->shouldReceive('subscribed')->andReturn(true);
        $mock->shouldReceive('cancelled')->andReturn(false);
        $mock->shouldReceive('subscription')->andReturnSelf();
        $mock->shouldReceive('getSubscriptionEndDate')->andReturn(
            \Carbon\Carbon::now()->addDay(10));

        App::instance('Illuminate\Contracts\Auth\Guard', $mock);
        $controller = m::mock('App\Http\Controllers\ProfileController',  [$mock]);
        $controller->makePartial();
        $controller->shouldReceive('loadCustomerOneTimePurchases')->andReturn([]);

        App::instance('App\Http\Controllers\ProfileController', $controller);

        $this->visit('/profile')
            ->see("Details")
            ->see("10 days from now")
            ->see("Cancel")
            ->click("Email/Password")
            ->see("Confirm Password")
            ->see("Password");
    }

    public function tearDown()
    {
        parent::tearDown();
        m::close();
    }


}
