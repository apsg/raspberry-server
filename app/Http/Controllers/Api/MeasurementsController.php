<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MeasurementsStoreRequest;
use App\Measurement;

class MeasurementsController extends Controller
{
    public function index()
    {
        return Measurement::where('created_at', '>', now()->subWeek())
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function store(MeasurementsStoreRequest $request)
    {
        $measurement = Measurement::create($request->all());

        return response()->json($measurement, 200);
    }
}
