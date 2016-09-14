<?php

namespace Openact\Repository;

use Openact\Model\TableModel as Table;

class TableRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($tables) {
        return $this->db->insert('tables', $tables);
    }

    function getByUuid($uuid) {
        $rows = $this->db->fetchAll(
            'SELECT * FROM tables WHERE uuid = ?',
            [$uuid]
        );
        if (empty($rows)) {
            return null;
        } else {
            return new Table($rows[0]);
        }
    }
}
