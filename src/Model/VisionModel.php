<?php

namespace Openact\Model;

class VisionModel {

    function __construct($data) {
        $this->uuid = $data['uuid'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->inshort = $data['inshort'];
        $this->differences = $data['differences'];
        $this->notes = $data['notes'];
    }
}
