<?php

namespace Versonix\Interview\Modules\IndexModule\Actions\Index;

use Versonix\Interview\Modules\IndexModule\Dtos\Factories\GuestFromPostRequestFactory;
use Versonix\Interview\Modules\IndexModule\Services\Booking\RequestService;
use Versonix\Interview\Modules\IndexModule\Services\Booking\GuestService;

class AddGuestAction {

    public function execute(array $input): array
    {
        $guests = [];
        $guest = GuestFromPostRequestFactory::create($input);

        $response = RequestService::make('/service.php');
        if ($response['status'] === 'ok') {

            $service = new GuestService();
            $service->addGuestToScheme($response['data'], $guest);

            $response = RequestService::make('/service.php', 'POST', [], $response['data']);
            if ($response['status'] === 'ok') {

                $guests = $service->findGuestsInScheme($response['data']);
            }
        }

        return $guests;
    }
}