<?php

namespace Openact\Controller;

use Openact\Repository\CitizenRepository;
use Openact\Repository\TableRepository;
use Openact\Repository\PostitRepository;
use Openact\Repository\MinistoryRepository;
use Openact\Repository\RawvisionRepository;
use Openact\Repository\VisionRepository;


class ApiController {

    function __construct($app) {
        $this->app = $app;
    }

    function build() {
        $app = $this->app;

        $API = $app['controllers_factory'];

        $API->get('/citizen/{uuid}', function ($uuid) use ($app) {
            $citizenRepository = new CitizenRepository($app);
            $citizen = $citizenRepository->getByUuid($uuid);
            return $app->json($citizen);
        });


        $API->post('/citizen', function () use ($app) {
            $citizenRepository = new CitizenRepository($app);
            return $app->json($citizenRepository->insert($_POST));
        });

        $API->get('/table/{uuid}', function ($uuid) use ($app) {
            $tableRepository = new TableRepository($app);
            $tables = $tableRepository->getByUuid($uuid);
            return $app->json($tables);
        });

        $API->get('/postit/{uuid}', function ($uuid) use ($app) {
            $postitRepository = new PostitRepository($app);
            $postits = $postitRepository->getByUuid($uuid);
            return $app->json($postits);
        });

        $API->get('/ministories/{uuid}', function ($uuid) use ($app) {
            $ministoryRepository = new MinistoryRepository($app);
            $ministories = $ministoryRepository->getByUuid($uuid);
            return $app->json($ministories);
        });

        $API->get('/rawvision/{uuid}', function ($uuid) use ($app) {
            $RawvisionRepository = new RawvisionRepository($app);
            $rawvisions = $RawvisionRepository->getByUuid($uuid);
            return $app->json($rawvisions);
        });

        $API->get('/vision/{uuid}', function ($uuid) use ($app) {
            $VisionRepository = new VisionRepository($app);
            $visions = $VisionRepository->getByUuid($uuid);
            return $app->json($visions);
        });

        return $API;
    }

}