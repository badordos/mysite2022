<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CVTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_cv_ok()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
