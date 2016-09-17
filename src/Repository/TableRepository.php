<?php

namespace Openact\Repository;

use Openact\Model\TableModel as Table;
use Openact\Library\UuidGeneratorLibrary as UuidGenerator;

class TableRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($tables) {
        $uuidGenerator = new UuidGenerator();
        $tables['uuid'] = $uuidGenerator->v4();
        try {
            $this->db->insert('tables', $tables);
            return ['uuid'=>$tables['uuid']];
        } catch (Exception $error) {
            return ['error'=>"Could not insert the new table."];
        }
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
