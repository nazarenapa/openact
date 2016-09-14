<?php

namespace Openact\Model;

class TableModel {

    function __construct($data) {
        $this->uuid = $data['uuid'];
        $this->number = $data['number'];
        $this->country = $data['country'];
    }
}
