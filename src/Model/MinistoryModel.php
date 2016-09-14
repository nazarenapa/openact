<?php

namespace Openact\Model;

class MinistoryModel {

    function __construct($data) {
        $this->uuid = $data['uuid'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->whywho = $data['whywho'];
        $this->category = $data['category'];
    }
}
