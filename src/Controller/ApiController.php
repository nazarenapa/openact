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

        $API->post('/table', function () use ($app) {
            $tableRepository = new TableRepository($app);
            return $app->json($tableRepository->insert($_POST));
        });

        $API->get('/postit/{uuid}', function ($uuid) use ($app) {
            $postitRepository = new PostitRepository($app);
            $postits = $postitRepository->getByUuid($uuid);
            return $app->json($postits);
        });

        $API->post('/postit', function () use ($app) {
            $postitRepository = new PostitRepository($app);
            return $app->json($postitRepository->insert($_POST));
        });

        $API->get('/ministories/{uuid}', function ($uuid) use ($app) {
            $ministoryRepository = new MinistoryRepository($app);
            $ministories = $ministoryRepository->getByUuid($uuid);
            return $app->json($ministories);
        });

        $API->post('/ministories', function () use ($app) {
            $ministoryRepository = new MinistoryRepository($app);
            return $app->json($ministoryRepository->insert($_POST));
        });

        $API->get('/rawvision/{uuid}', function ($uuid) use ($app) {
            $rawvisionRepository = new RawvisionRepository($app);
            $rawvisions = $rawvisionRepository->getByUuid($uuid);
            return $app->json($rawvisions);
        });

        $API->post('/rawvision', function () use ($app) {
            $rawvisionRepository = new RawvisionRepository($app);
            return $app->json($rawvisionRepository->insert($_POST));
        });

        $API->get('/vision/{uuid}', function ($uuid) use ($app) {
            $visionRepository = new VisionRepository($app);
            $visions = $visionRepository->getByUuid($uuid);
            return $app->json($visions);
        });

        $API->post('/vision', function () use ($app) {
            $visionRepository = new VisionRepository($app);
            return $app->json($visionRepository->insert($_POST));
        });

        return $API;
    }

}