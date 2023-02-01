<?php

namespace Tests\Feature;

use Tests\TestCase;

class Attempt2ExampleTest extends TestCase
{
    /** @test */
    public function it_returns_422_status_when_userId_valid_but_description_is_missing(): void
    {
        $this->postJson(route('example'), [
            'userId' => 9999999,
        ])->assertStatus(422);
    }
}
