<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        dump('Setting up the test');
    }

    protected function tearDown(): void
    {
        dump('Tearing down the test');

        parent::tearDown();
    }

    public function test_sample_1(): void
    {
        $response = $this->get('/');
        dump('sample1');

        $response->assertStatus(200);
    }

    public function test_sample_2(): void
    {
        $response = $this->get('/');
        dump('sample2');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
