<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use App\Models\Travel;


/**
 * @group public Routs
 */
class TravelController extends Controller
{
    /**
     * Display a listing of the public travels.
     * @apiResourceCollection App\Http\Resources\TravelResource
     * @unauthenticated
     * @apiResourceModel App\Models\Travel
     */
    public function index()
    {
        $travels = Travel::where('is_public', true)->paginate();

        return TravelResource::collection($travels);
    }
}
