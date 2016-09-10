<?php

namespace Openact\Repository;

use Openact\Model\CitizenModel as Citizen;

class CitizenRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($citizen) {
        return $this->db->insert('citizens', $citizen);
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
