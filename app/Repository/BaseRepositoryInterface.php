<?php

namespace App\Repository;


interface BaseRepositoryInterface {


    public  function create($createArr);

    public  function store();

    public function show();

    public  function delete();

}
