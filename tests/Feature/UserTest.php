<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
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
    public function get_users()
    {
        $response = $this->get('/users');
        $response->assertSee('Adrian');
    }

    /** @test */
    public function create_user()
    {
        $response = $this->post('/users', [
            'name' => 'test_create_user'
        ]);
        $response->assertSee('test_create_user');
    }
    
    /** @test */
    /**
     * I test if is redirected to home because when a Laravel validation fails, it redirect to the previous page (At controller)
     */
    public function create_user_without_name()
    {
        $response = $this->post('/users', [
            'name' => ''
        ]);
        $response->assertRedirect('/');
    }

    /** @test */
    public function add_user_to_project()
    {
        $response = $this->post('/users/addToProject', [
            'user_id' => 4,
            'projects' => [
                [
                    'project_id' => 1,
                    'rol_id' => 2
                ]
            ]
        ]);
        $response->assertSee('userName');
        $response->assertSee('projectName');
    }

    /** @test */
    public function add_user_to_activity()
    {
        $response = $this->post('/users/addToActivity', [
            'user_id' => 4,
            'activities' => [
                [
                    'activity_id' => 1,
                    'rol_id' => 1
                ]
            ]
        ]);
        $response->assertSee('userName');
        $response->assertSee('activityName');
    }

    /** @test */
    public function get_activities_from_user_as_participant()
    {
        $response = $this->get('/users/2/activities');
        $response->assertSee('activityName');
    }

    /** @test */
    public function get_incidents_from_user()
    {
        $response = $this->get('users/2/incidents');
        $response->assertSee('activityName');
        $response->assertSee('incident');
    }
}
