<?php

namespace Openact\Model;

class RawvisionModel {

    function __construct($data) {
        $this->uuid = $data['uuid'];
        $this->title = $data['title'];
        $this->description = $data['description'];
    }
}
