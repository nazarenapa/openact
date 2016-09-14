<?php

namespace Openact\Model;

class PostitModel {

    function __construct($data) {
        $this->uuid = $data['uuid'];
        $this->prompt = $data['prompt'];
        $this->answer = $data['answer'];
        $this->category = $data['category'];
    }
}
