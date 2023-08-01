<?php

namespace Tests\Feature;

use Tests\TestCase;

class Attempt3ExampleTest extends TestCase
{
    /** @test */
    public function it_returns_422_status_when_form_data_not_provided_as_all_fields_are_required_with_messages(): void
    {
        $this->postJson(route('example'), [])
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'userId' => 'The user id field is required.',
                'description' => 'The description field is required.',
            ]);
    }

    /** @test */
    public function it_returns_422_status_when_form_data_not_provided_as_all_fields_are_required_with_keys(): void
    {
        $this->postJson(route('example'), [])
            ->assertStatus(422)
            ->assertInvalid([
                'userId' => 'required',
                'description' => 'required',
            ]);
    }

    /** @test */
    public function it_returns_422_status_when_fields_are_provided_as_invalid_types(): void
    {
        $this->postJson(route('example'), [
            'userId' => 'string',
            'description' => ['array'],
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'userId' => 'The user id must be an integer.',
                'description' => 'The description must be a string.',
            ]);
    }

    /** @test */
    public function it_returns_422_status_when_userId_is_too_few_digits(): void
    {
        $this->postJson(route('example'), [
            'userId' => 55555,
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'userId' => 'The user id must be 6 digits.',
            ]);
    }

    /** @test */
    public function it_returns_422_status_when_userId_is_too_many_digits(): void
    {
        $this->postJson(route('example'), [
            'userId' => 7777777,
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'userId' => 'The user id must be 6 digits.',
            ]);
    }

    /** @test */
    public function it_returns_422_status_when_description_is_too_many_characters(): void
    {
        $this->postJson(route('example'), [
            'description' => 'string-more-than-20-chars',
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'description' => 'The description must not be greater than 20 characters.',
            ]);
    }
}
