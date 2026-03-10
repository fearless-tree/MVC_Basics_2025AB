<?php

class ZangeressenController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('Zangeres');
    }

    public function index()
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->zangeresModel->getAllZangeressen($display='none', $message = '');

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Rijkste Zangeressen',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view aangeroepen
         */
        $this->view('zangeressen/index', $data);
    }

    public function delete($id)
    {
        $result = $this->zangeresModel->delete($id);

        header('Refresh:3 ; url=' . URLROOT . '/ZangeressenController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe zangeres toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['naam']) ||
                empty($_POST['nationaliteit']) ||
                empty($_POST['nettowaarde']) ||
                empty($_POST['geboortedatum']) ||
                empty($_POST['bekendstehit'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->zangeresModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/ZangeressenController/index');
            }
        }

        $this->view('zangeressen/create', $data);
    }

}