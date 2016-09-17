<?php

namespace Openact\Repository;

use Openact\Model\RawvisionModel as Rawvision;
use Openact\Library\UuidGeneratorLibrary as UuidGenerator;

class RawvisionRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($rawvisions) {
        $uuidGenerator = new UuidGenerator();
        $rawvisions['uuid'] = $uuidGenerator->v4();
        try {
            $this->db->insert('rawvisions', $rawvisions);
            return ['uuid'=>$rawvisions['uuid']];
        } catch (Exception $error) {
            return ['error'=>"Could not insert the new raw vision."];
        }
    }

    function getByUuid($uuid) {
        $rows = $this->db->fetchAll(
            'SELECT * FROM rawvisions WHERE uuid = ?',
            [$uuid]
        );
        if (empty($rows)) {
            return null;
        } else {
            return new Rawvision($rows[0]);
        }
    }
}
