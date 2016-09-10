<?php

namespace Openact\Controller;

use Openact\Repository\CitizenRepository;

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

        $API->get('/table/{uuid}', function ($uuid) use ($app) {
            // codice
        });

        $API->get('/postit/{uuid}', function ($uuid) use ($app) {
            // codice
        });

        $API->get('/ministorie/{uuid}', function ($uuid) use ($app) {
            // codice
        });

        $API->get('/rawvision/{uuid}', function ($uuid) use ($app) {
            // codice
        });

        $API->get('/vision/{uuid}', function ($uuid) use ($app) {
            // codice
        });

        return $API;
    }

}