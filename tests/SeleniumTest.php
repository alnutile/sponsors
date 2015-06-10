<?php

use Laracasts\Integrated\Extensions\Selenium as IntegrationTest;


class SeleniumTest extends IntegrationTest {

    protected $baseUrl = 'https://sponsors.dev:44300';
    protected $faker;

    public function setUp()
    {
        parent::setUp();
        $this->faker = Faker\Factory::create();
    }

    /**
     * @test
     */
    public function test_bulk_purchase()
    {
        $this->markTestSkipped("Need to work on this more or go behat");

        $this->visit('sponsor')
            ->click('Non Subscription Purchase')
            ->see("Pay with Card")
            ->submitForm('Pay with Card', [])
            ->submitForm('Pay $225.00', [
                'email' => $this->faker->email,
                'card_number' => '4242424242424242',
                'cc-exp' => '02/20',
                'cc-csc' => '222'
            ]);
    }
}