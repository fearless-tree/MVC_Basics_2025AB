<?php

class HorlogesController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index()
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->horlogeModel->getAllHorloges($display='none', $message = '');

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Duurste Horloges',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view aangeroepen
         */
        $this->view('horloges/index', $data);
    }

    public function delete($id)
    {
        $result = $this->horlogeModel->delete($id);

        header('Refresh:3 ; url=' . URLROOT . '/HorlogesController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuw horloge toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['diameter']) ||
                empty($_POST['beweging']) ||
                empty($_POST['releasedatum'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->horlogeModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/HorlogesController/index');
            }
        }

        $this->view('horloges/create', $data);
    }

}