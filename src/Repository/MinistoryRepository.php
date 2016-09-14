<?php

namespace Openact\Repository;

use Openact\Model\MinistoryModel as Ministory;

class MinistoryRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($ministories) {
        return $this->db->insert('ministories', $ministories);
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
