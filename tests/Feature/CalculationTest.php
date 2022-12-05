<?php

namespace Tests\Feature;


use Tests\TestCase;

class CalculationTest extends TestCase
{

    public function test_return_result_when_n_is_small_number_3()
    {
        $queryParameter = [
            "n" => "3",
        ];
        $response = $this->get(route('fibo', $queryParameter));

        $response
            ->assertStatus(200)
            ->assertJson([
                'result' => 2
            ]);
    }

    public function test_return_result_when_n_is_small_number_30()
    {
        $queryParameter = [
            "n" => "30",
        ];
        $response = $this->get(route('fibo', $queryParameter));

        $response
            ->assertStatus(200)
            ->assertJson([
                'result' => 832040
            ]);
    }

    public function test_return_result_when_n_is_big_number_99()
    {
        $queryParameter = [
            "n" => "99",
        ];
        $response = $this->get(route('fibo', $queryParameter));

        $response
            ->assertStatus(200)
            ->assertJson([
                'result' => 2.189229958345552e+20
            ]);
    }

    public function test_return_error_when_not_query_parameter()
    {
        $response = $this->get(route('fibo'));

        $response
            ->assertStatus(400)
            ->assertJson([
                "status" => 400,
                "message" => "Bad Request. Query parameter 'n' is required."
            ]);
    }

    public function test_return_error_when_n_is_float()
    {
        $queryParameter = [
            "n" => "3.3",
        ];
        $response = $this->get(route('fibo', $queryParameter));

        $response
            ->assertStatus(400)
            ->assertJson([
                "status" => 400,
                "message" => "Bad Request. Query parameter 'n' should be a natural number."
            ]);
    }

    public function test_return_error_when_n_is_string()
    {
        $queryParameter = [
            "n" => "string",
        ];
        $response = $this->get(route('fibo', $queryParameter));

        $response
            ->assertStatus(400)
            ->assertJson([
                "status" => 400,
                "message" => "Bad Request. Query parameter 'n' should be a natural number."
            ]);
    }

    public function test_return_error_when_n_is_minus_number()
    {
        $queryParameter = [
            "n" => "-3",
        ];
        $response = $this->get(route('fibo', $queryParameter));

        $response
            ->assertStatus(400)
            ->assertJson([
                "status" => 400,
                "message" => "Bad Request. Query parameter 'n' should be a natural number."
            ]);
    }
}
