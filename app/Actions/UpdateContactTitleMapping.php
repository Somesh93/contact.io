<?php
namespace App\Actions;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateContactTitleMapping {


    public function execute($MappingArr) {


        $ContactTitleMappingResponse =  app()->make(\App\Repository\CompanyJobTitleMappingRepository::class)->create($MappingArr);

        if(!Arr::accessible($ContactTitleMappingResponse)) {
            DB::rollBack();
            return new JsonResponse('Contact Creation Failed', 422);
        }

        DB::commit();

        return new JsonResponse('Contact Created', 201);


    }


}
