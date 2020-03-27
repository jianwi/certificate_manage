<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AwardResource;
use App\Models\Activity;
use Illuminate\Http\Request;

class AwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $activity)
    {
        return AwardResource::collection($activity->awards);
    }

}
