<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use App\Http\Controllers\Controller;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::orderBy('created_at','desc')->limit(10)->get();
        return ActivityResource::collection($activities);
    }
}
