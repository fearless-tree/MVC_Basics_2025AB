<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index()
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->sneakerModel->getAllSneakers($display='none', $message = '');

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Overzicht Sneakers',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view aangeroepen
         */
        $this->view('sneaker/index', $data);
    }

    public function delete($id)
    {
        $result = $this->sneakerModel->delete($id);

        header('Refresh:3 ; url=' . URLROOT . '/SneakerController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe sneaker toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['type']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['releasedatum'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->sneakerModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/SneakerController/index');
            }
        }

        $this->view('sneaker/create', $data);
    }

}