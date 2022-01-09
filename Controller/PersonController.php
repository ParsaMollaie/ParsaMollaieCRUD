<?php

namespace CRUD\Controller;

use CRUD\Model\Actions;
use CRUD\Helper\PersonHelper;
use CRUD\Helper\DBConnector;

class PersonController
{
    public function switcher($uri,$request)
    {
        switch ($uri)
        {
            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction($request);
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                break;
        }
    }

    public function createAction($request)
    {
        
        $ph = new PersonHelper();
        $ph->insert();

       
        $person = new Person();
        $person->setFirstName($request['firstName']);
        $person->setLastName($request['lastName']);
        $person->setUsername($request['username']);
        $ph->insert($person);


    }

    public function updateAction($request)
    {
        $ph = new PersonHelper();
        $ph->update();

    }

    public function readAction($request)
    {
        $ph = new PersonHelper();
        $ph->fetch();

    }
    public function readAllAction($request)
    {

        $ph = new PersonHelper();
        $ph->fetchAll();

    }

    public function deleteAction($request)
    {
        $ph = new PersonHelper();
        $ph->delete();

    }

}