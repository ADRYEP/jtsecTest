<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function get_activities_from_project()
    {
        $response = $this->get('projects/1/activities');
        $response->assertSee('name');
    }

    /** @test */
    public function get_participants_from_project()
    {
        $response = $this->get('projects/1/participants');
        $response->assertSee('Adrian');
    }
}
