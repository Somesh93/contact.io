<?php

namespace App\Repository;



use App\Models\Contact;

class ContactRepository implements BaseRepositoryInterface
{

    private $Contactmodel;


    public function __construct(Contact $Contactmodel)
    {
        $this->Contactmodel = $Contactmodel;
    }


    public function create($createRequest)
    {

        return $this->Contactmodel->create($createRequest);
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

    public function searchContacts($searchKeywords){
        $query = $this->Contactmodel::query();


        $query->select('contacts.id', 'contacts.name', 'contacts.email', 'job_titles.title')
            ->leftJoin('company_job_title_mapping', 'contacts.id', '=', 'company_job_title_mapping.contact_id')
            ->leftJoin('job_titles', 'company_job_title_mapping.title_id', '=', 'job_titles.id')
            ->where(function ($query) use ($searchKeywords) {
                foreach ($searchKeywords as $keyword) {
                    $keyword = trim($keyword);
                    if ($keyword) {
                        $query->orWhere(function ($query) use ($keyword) {
                            $query->orWhere('name', 'LIKE', "%$keyword%")
                                ->orWhere('email', 'LIKE', "%$keyword%")
                                ->orWhere('title', 'LIKE', "%$keyword%");
                        });
                    }
                }
            });
        return $query->paginate(10);

    }




}

