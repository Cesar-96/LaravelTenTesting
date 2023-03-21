<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MakeTodayTest extends TestCase
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

        $this->assertDatabaseHas('users',[
            'name'=>'pablo',
        ]);

//        $this->assertDatabaseHas('users',[
//            'name'=>'nayely',
//        ]);

    }
    public function test_it_loads_the_users_list_page()
    {
        $response = $this->get('/usuarios');

        $response->assertStatus(200);
        $response->assertSee('Usuarios');
    }

    function test_it_welcomes_users_with_nickname(){
        $this->get('welcome/pablo/dricko')
            ->assertStatus(200)
            ->assertSee('Welcome Pablo, your nickname is Dricko');
    }
}
