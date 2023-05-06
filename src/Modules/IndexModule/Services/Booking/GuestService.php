<?php

namespace Versonix\Interview\Modules\IndexModule\Services\Booking;

use Versonix\Interview\Modules\IndexModule\Dtos\Factories\GuestFromXmlFactory;
use Versonix\Interview\Modules\IndexModule\Dtos\GuestDto;
use SimpleXMLElement;

class GuestService
{
    public function findGuestsInScheme(SimpleXMLElement $data): array
    {
        $guests = [];

        foreach ($data->ResGuests[0] as $item) {

             $guests[] = GuestFromXmlFactory::create($item);
        }

        return $guests;
    }

    public function addGuestToScheme(SimpleXMLElement &$data, GuestDto $guest): void
    {
        $item = $data->ResGuests->addChild('ResGuest');

        $item->addChild('GuestSeqN', $guest->segN);
        $item->addChild('GuestID', $guest->id);
        $item->addChild('GuestType', $guest->type);
        $item->addChild('GuestAge', $guest->age);
        $item->addChild('ClientID', $guest->clientId);
        $item->addChild('AgeCategory', $guest->ageCategory);
        $item->addChild('SecretCode', $guest->secretCode);
    }
}