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
            abort(400, 'Query parameter \'n\' is required.');
        }

        if (!$this->calculationService->isNaturalNumber($queryParameter)){
            abort(400, 'Query parameter \'n\' should be a natural number.');
        }

        $nthFibonacci = $this->calculationService->getFibonacci($queryParameter);

        return response()->json([
            "result" => $nthFibonacci
        ], Response::HTTP_OK);
    }
}
