<?php

namespace Versonix\Interview\Modules\IndexModule\Controllers;

use Versonix\Interview\Main\Param;
use Versonix\Interview\Modules\IndexModule\Controller;
use Versonix\Interview\Modules\IndexModule\Services\Booking\RequestService;
use Versonix\Interview\Modules\IndexModule\Services\Booking\GuestService;
use Versonix\Interview\Modules\IndexModule\Actions\Index\AddGuestAction;

class IndexController extends Controller {

    public function index()
    {
        $guests = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $action = new AddGuestAction();
            $guests = $action->execute($_POST);

        } else {

            $response = RequestService::make('/service.php');
            if ($response['status'] === 'ok') {

                $serviceGuest = new GuestService();
                $guests = $serviceGuest->findGuestsInScheme($response['data']);
            }
        }

        $this->render('index.index.index', ['guests' => $guests]);
    }
}