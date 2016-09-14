<?php

namespace Openact\Repository;

use Openact\Model\PostitModel as Postit;

class PostitRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($postits) {
        return $this->db->insert('postits', $postits);
    }

    function getByUuid($uuid) {
        $rows = $this->db->fetchAll(
            'SELECT * FROM postits WHERE uuid = ?',
            [$uuid]
        );
        if (empty($rows)) {
            return null;
        } else {
            return new Postit($rows[0]);
        }
    }
}
