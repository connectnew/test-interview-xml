<?php

namespace Versonix\Interview\Modules\IndexModule\Dtos\Factories;

use Versonix\Interview\Modules\IndexModule\Dtos\GuestDto;

class GuestFromPostRequestFactory {

    public static function create(array $data): GuestDto
    {
        $guest = new GuestDto();

        $guest->segN = (int) $data['seg_num'];
        $guest->id = (int) $data['id'];
        $guest->type = (string) $data['type'];
        $guest->age = (int) $data['age'];
        $guest->clientId = (int) $data['client_id'];
        $guest->ageCategory = (string) $data['age_category'];
        $guest->secretCode = (string) $data['secret_code'];

        return $guest;
    }
}