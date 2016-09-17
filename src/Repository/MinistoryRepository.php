<?php

namespace Openact\Repository;

use Openact\Model\MinistoryModel as Ministory;
use Openact\Library\UuidGeneratorLibrary as UuidGenerator;

class MinistoryRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($ministories) {
        $uuidGenerator = new UuidGenerator();
        $ministories['uuid'] = $uuidGenerator->v4();
        try {
            $this->db->insert('ministories', $ministories);
            return ['uuid'=>$ministories['uuid']];
        } catch (Exception $error) {
            return ['error'=>"Could not insert the new ministory."];
        }
    }

    function getByUuid($uuid) {
        $rows = $this->db->fetchAll(
            'SELECT * FROM ministories WHERE uuid = ?',
            [$uuid]
        );
        if (empty($rows)) {
            return null;
        } else {
            return new Ministory($rows[0]);
        }
    }
}
