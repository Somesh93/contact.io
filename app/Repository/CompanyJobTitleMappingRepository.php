<?php

namespace App\Repository;


use App\Models\CompanyJobTitleMapping;

class CompanyJobTitleMappingRepository implements  BaseRepositoryInterface
{

    private $CompanyJobTitleMappingModel;


    public function __construct(CompanyJobTitleMapping $CompanyJobTitleMappingModel)
    {
        $this->CompanyJobTitleMappingModel = $CompanyJobTitleMappingModel;
    }


    public function create($createRequest)
    {

        return $this->CompanyJobTitleMappingModel->create($createRequest);

    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
