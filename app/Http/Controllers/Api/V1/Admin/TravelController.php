<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use App\Http\Resources\TravelResource;
use App\Models\Travel;

class TravelController extends Controller
{

    /**
     * 
     * @group Admin Routs
     * Store a newly created travel in storage.
     * @apiResource App\Http\Resources\TravelResource
     * @authenticated
     * @apiResourceModel App\Models\Travel
     */
    public function store(TravelRequest $request)
    {
        $travel = Travel::create($request->validated());

        return new TravelResource($travel);
    }

    /**
     * @group Auth Routs
     * Update the Travel
     * @apiResource App\Http\Resources\TravelResource
     * @authenticated
     * @apiResourceModel App\Models\Travel
     * 
     */
    public function update(TravelRequest $request, Travel $travel)
    {
        $travel->update($request->validated());

        return new TravelResource($travel);
    }
}
