<?php

class SneakerController extends BaseController {
    private $sneakerModel;

    public function __construct() {
        // Laad het model in
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index() {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->sneakerModel->getAllSneakers();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title' => 'Overzicht Sneakers',
            'result' => $result
        ];

        /**
         * Roep de view aan en geef de data mee
         */
        $this->view('sneaker/index', $data);
    }
}