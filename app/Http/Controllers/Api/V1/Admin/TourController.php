<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Http\Resources\TourResource;
use App\Models\Travel;

/**
 * @group Admin Routs
 */

class TourController extends Controller
{

    /**
     * Store a newly created tour in storage py admin. 
     * @apiResource App\Http\Resources\TourResource
     * @authenticated
     * @apiResourceModel App\Models\Tour
     */
    public function store(Travel $travel, TourRequest $request)
    {
        $tour = $travel->tours()->create($request->validated());

        return new TourResource($tour);
    }
}
