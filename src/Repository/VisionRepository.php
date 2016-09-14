<?php

namespace Openact\Repository;

use Openact\Model\VisionModel as Vision;

class VisionRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($visions) {
        return $this->db->insert('visions', $visions);
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
