<?php

namespace Tests\Feature;

use Tests\TestCase;

class Attempt4ExampleTest extends TestCase
{
    /**
     * @test
     * @dataProvider invalidFormValidationProvider
     */
    public function it_returns_422_status_when_invalid_form_data_is_provided(
        array $formData,
        array $errorMessages
    ): void {
        $this->postJson(route('example'), $formData)
            ->assertStatus(422)
            ->assertJsonValidationErrors($errorMessages);
    }

    public function invalidFormValidationProvider(): array
    {
        return [
            [
                [],
                [
                    'userId' => 'The customer id field is required.',
                    'description' => 'The description field is required.',
                ]
            ],
            [
                [
                    'userId' => 'string',
                    'description' => ['array'],
                ],
                [
                    'userId' => 'The customer id must be an integer.',
                    'description' => 'The description must be a string.',
                ]
            ],
            [
                ['userId' => 55555],
                ['userId' => 'The customer id must be 6 digits.']
            ],
            [
                ['userId' => 7777777],
                ['userId' => 'The customer id must be 6 digits.'],
            ],
            [
                ['description' => 'string-more-than-20-chars'],
                ['description' => 'The description may not be greater than 20 characters.']
            ]
        ];
    }
}
