<?php

namespace Fferriere\GeneratorExample\Controller;

class PersonController extends Controller {

    public function exportAction()
    {
        $repository = $this->get('repository.person');
        $exporter = $this->get('csv_exporter');

        $exporter->export(
            $repository->findAllAsArray()
        );
    }

}
