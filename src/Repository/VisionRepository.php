<?php

namespace Openact\Repository;

use Openact\Model\VisionModel as Vision;
use Openact\Library\UuidGeneratorLibrary as UuidGenerator;

class VisionRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($visions) {
        $uuidGenerator = new UuidGenerator();
        $visions['uuid'] = $uuidGenerator->v4();
        try {
            $this->db->insert('visions', $visions);
            return ['uuid'=>$visions['uuid']];
        } catch (Exception $error) {
            return ['error'=>"Could not insert the new vision."];
        }
    }

    function getByUuid($uuid) {
        $rows = $this->db->fetchAll(
            'SELECT * FROM visions WHERE uuid = ?',
            [$uuid]
        );
        if (empty($rows)) {
            return null;
        } else {
            return new Vision($rows[0]);
        }
    }
}
