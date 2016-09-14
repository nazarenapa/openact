<?php

namespace Openact\Model;

class CitizenModel {

    function __construct($data) {
        $this->uuid = $data['uuid'];
        $this->firstName = $data['first_name'];
        $this->lastName = $data['last_name'];
        $this->country = $data['country'];
        $this->city = $data['city'];
        $this->age = $data['age'];
        $this->gender = $data['gender'];
        $this->occupation = $data['occupation'];
        $this->eduLevel = $data['edu_level'];
        $this->tableUuid = $data['table_uuid'];
    }
}
