<?php

namespace Fferriere\GeneratorExample\Controller;

class PersonController extends Controller
{

    public function getPersonRepository()
    {
        return $this->get('repository.person');
    }

    public function exportGeneratorAction()
    {
        $repository = $this->getPersonRepository();
        $exporter = $this->get('csv_exporter');

        $exporter->export(
            $repository->findAllAsArrayGenerator()
        );
    }

    public function exportArrayAction()
    {
        $repository = $this->get('repository.person');
        $exporter = $this->get('csv_exporter');

        $exporter->export(
            $repository->findAllAsArrayWithArray()
        );
    }

}
