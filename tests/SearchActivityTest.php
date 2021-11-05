<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use \App\Models\Activity;

class SearchActivityTest extends TestCase
{
    /** @test */
    public function search_success_activities()
    {
        Activity::factory()->count(10)->create();
        $body = [
            "date" => "2021-11-05"
        ];
        $this->post('/activities/search', $body);
        $this->assertEquals(200, $this->response->status());
    }
    /** @test */
    public function search_error_activities()
    {
        Activity::factory()->count(10)->create();
        $body = [];
        $this->post('/activities/search', $body);
        $this->assertEquals(500, $this->response->status());
    }
}
