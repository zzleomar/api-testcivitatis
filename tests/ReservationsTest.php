<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use \App\Models\Activity;

class ReservationsTest extends TestCase
{
    /** @test */
    public function reservation_activity_success()
    {
        Activity::factory()->count(10)->create();
        $body = [
            "date" => "2021-11-05",
            "quantity" => 12,
            "activityId" => 1
        ];
        $this->post('/reservate', $body);
        $this->assertEquals(200, $this->response->status());
    }
    /** @test */
    public function reservation_activity_error()
    {
        Activity::factory()->count(10)->create();
        $body = [];
        $this->post('/reservate', $body);
        $this->assertEquals(500, $this->response->status());
    }
}
