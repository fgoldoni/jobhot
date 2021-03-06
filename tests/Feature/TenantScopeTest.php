<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantScopeTest extends TestCase
{
   use RefreshDatabase, WithFaker;

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
