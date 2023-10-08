<?php

namespace App\Actions;


use App\Models\Contact;
use App\Repository\ContactRepository;

class  SearchContactsAction
{


    public function execute($keywords)
    {
        $searchKeywords = explode(',', $keywords);

        return app()->make(ContactRepository::class)->searchContacts($searchKeywords);

    }

}
