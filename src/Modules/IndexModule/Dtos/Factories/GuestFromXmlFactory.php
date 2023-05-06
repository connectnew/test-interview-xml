<?php

namespace Versonix\Interview\Modules\IndexModule\Dtos\Factories;

use Versonix\Interview\Modules\IndexModule\Dtos\GuestDto;
use SimpleXMLElement;

class GuestFromXmlFactory {

    public static function create(SimpleXMLElement $data): GuestDto
    {
        $guest = new GuestDto();

        $guest->segN = (int) $data->GuestSeqN;
        $guest->id = (int) $data->GuestID;
        $guest->type = (string) $data->GuestType;
        $guest->age = (int) $data->GuestAge;
        $guest->clientId = (int) $data->ClientID;
        $guest->ageCategory = (string) $data->AgeCategory;
        $guest->secretCode = (string) $data->SecretCode;

        return $guest;
    }
}