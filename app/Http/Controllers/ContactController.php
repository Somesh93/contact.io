<?php

namespace App\Http\Controllers;

use App\Actions\SearchContactsAction;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\GetContactRequest;
use App\Models\CompanyJobTitleMapping;
use App\Models\Contact;
use App\Repository\CompanyJobTitleMappingRepository;
use App\Repository\ContactRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;
use Psy\Util\Json;
use UpdateContactTitleMapping;

class ContactController extends Controller
{
    public function getContact(GetContactRequest $request)
    {

        $keywords = data_get($request->validated(), 'keywords');

        try {

            return app()->make(SearchContactsAction::class)->execute($keywords);

        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    public function createContact(CreateContactRequest $request)
    {
        $validatedRequest = $request->validated();


        // Check If Email ID Exists
        try {
            DB::beginTransaction();

            $email = data_get($validatedRequest, 'email');
            $titleId = data_get($validatedRequest, 'title_id');

            $emailExistsResponse = Contact::where('email', '=', $email)->first();

            $contactId = data_get($emailExistsResponse, 'id', false);

            $emailjobTitleMappingResponse = CompanyJobTitleMapping::where([
                'contact_id' => $contactId,
                'title_id' => $titleId
            ])->first();

            if (Arr::accessible($emailjobTitleMappingResponse)) {
                return new JsonResponse('Similar Record Exist for the Email Id and Job Title', '422');
            }

            if(Arr::accessible($emailExistsResponse)) {

                $updateMappingArr = [
                    'contact_id' => $contactId,
                    'title_id' => data_get($validatedRequest, 'title_id')
                ];


               return  app()->make(UpdateContactTitleMapping::class)->execute($updateMappingArr);

            }

            $ContactCreateArr = [
                'name' => data_get($validatedRequest, 'name'),
                'email' => data_get($validatedRequest, 'email'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ];

            $ContactRepositoryResponse = app()->make(ContactRepository::class)->create($ContactCreateArr);

            if(!$ContactRepositoryResponse){
                return new JsonResponse('Failed to Create Contact', 422);
                DB::rollBack();
            }


            if(!$contactId){
              $contactId =  data_get($ContactRepositoryResponse, 'id');
            }

            $updateMappingArr = [
                'contact_id' => $contactId,
                'title_id' => data_get($validatedRequest, 'title_id')
            ];

            DB::commit();
            return  app()->make(CompanyJobTitleMappingRepository::class)->create($updateMappingArr);


        } catch (\Exception $e) {
            DB::rollBack();
            return new JsonResponse($e->getMessage(), 422);
        }


    }

}
