<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobTitleResource;
use App\Models\JobTitle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    public  function index(){

//        return new   JsonResponse(JobTitleResource::collection(JobTitle::all()));

//        return new JsonResponse(JobTitle::all());

        return response()->json(JobTitleResource::collection(JobTitle::all()));
    }
}
