<?php

namespace Openact\Repository;

use Openact\Model\CitizenModel as Citizen;
use Openact\Library\UuidGeneratorLibrary as UuidGenerator;

class CitizenRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($citizen) {
        $uuidGenerator = new UuidGenerator();
        $citizen['uuid'] = $uuidGenerator->v4();
        try {
            $this->db->insert('citizens', $citizen);
            return ['uuid'=>$citizen['uuid']];
        } catch (Exception $error) {
            return ['error'=>"Could not insert the new citizen."];
        }
    }

    function getByUuid($uuid) {
        $rows = $this->db->fetchAll(
            'SELECT * FROM citizens WHERE uuid = ?',
            [$uuid]
        );
        if (empty($rows)) {
            return null;
        } else {
            return new Citizen($rows[0]);
        }
    }
}
