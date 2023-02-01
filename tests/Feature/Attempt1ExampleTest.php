<?php

namespace Tests\Feature;

use Tests\TestCase;

class Attempt1ExampleTest extends TestCase
{
    /** @test */
    public function it_returns_422_status_when_form_data_not_provided(): void
    {
        $this->postJson(route('example'), [])
            ->assertStatus(422);
    }
}
