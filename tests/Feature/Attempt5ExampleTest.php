<?php

namespace Tests\Feature;

use Tests\TestCase;

class Attempt5ExampleTest extends TestCase
{
    /**
     * @test
     * @dataProvider invalidFormValidationProvider
     */
    public function it_returns_validation_error_status_when_invalid_form_data_is_provided(
        array $formData,
        array $errorMessages
    ): void {
        $this->postJson(route('example'), $formData)
            ->assertUnprocessable()
            ->assertJsonValidationErrors($errorMessages);
    }

    public function invalidFormValidationProvider(): array
    {
        return [
            'All fields must be required' => [
                [],
                [
                    'userId' => 'The user id field is required.',
                    'description' => 'The description field is required.',
                ]
            ],
            'All fields must be the correct type' => [
                [
                    'userId' => 'string',
                    'description' => ['array'],
                ],
                [
                    'userId' => 'The user id must be an integer.',
                    'description' => 'The description must be a string.',
                ]
            ],
            'User id must not be less than 6 digits' => [
                ['userId' => 55555],
                ['userId' => 'The user id must be 6 digits.']
            ],
            'User id must not be more than 6 digits' => [
                ['userId' => 7777777],
                ['userId' => 'The user id must be 6 digits.'],
            ],
            'The description may not be greater than 20 characters' => [
                ['description' => 'string-more-than-20-chars'],
                ['description' => 'The description must not be greater than 20 characters.']
            ]
        ];
    }
}
