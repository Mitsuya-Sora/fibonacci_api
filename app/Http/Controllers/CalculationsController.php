<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CalculationService;
use Symfony\Component\HttpFoundation\Response;

class CalculationsController extends Controller
{

    public function __construct(calculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    public function fibonacci(Request $request)
    {
        (string) $queryParameter = $request->input('n');

        if (!$queryParameter){
            return response()->json([
                "status" => 400,
                "message" => "Bad Request. Query parameter 'n' is required."
            ], Response::HTTP_BAD_REQUEST);
        }

        if (!$this->calculationService->isNaturalNumber($queryParameter)){
            return response()->json([
                "status" => 400,
                "message" => "Bad Request. Query parameter 'n' should be a natural number."
            ], Response::HTTP_BAD_REQUEST);
        }

        $nthFibonacci = $this->calculationService->getFibonacci($queryParameter);

        return response()->json([
            "result" => $nthFibonacci
        ], Response::HTTP_OK);
    }
}
