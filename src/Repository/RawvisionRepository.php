<?php

namespace Openact\Repository;

use Openact\Model\RawvisionModel as Rawvision;

class RawvisionRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($rawvisions) {
        return $this->db->insert('rawvisions', $rawvisions);
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
