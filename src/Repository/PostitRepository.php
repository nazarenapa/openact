<?php

namespace Openact\Repository;

use Openact\Model\PostitModel as Postit;
use Openact\Library\UuidGeneratorLibrary as UuidGenerator;

class PostitRepository {

    function __construct($app) {
        $this->app = $app;
        $this->db = $this->app['db'];
    }

    function insert($postits) {
        $uuidGenerator = new UuidGenerator();
        $postits['uuid'] = $uuidGenerator->v4();
        try {
            $this->db->insert('postits', $postits);
            return ['uuid'=>$postits['uuid']];
        } catch (Exception $error) {
            return ['error'=>"Could not insert the new postit."];
        }
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
