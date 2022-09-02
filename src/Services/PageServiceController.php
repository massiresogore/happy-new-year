<?php

namespace App\Services;

use DateTimeImmutable;
use DateTimeZone;

class PageServiceController
{
    public function dayLeftUntilNextYear()
    {
        return (new DateTimeImmutable(' 1st January next Year ', (new DateTimeZone('Europe/Paris'))))->diff($this->dateNow());
    }

    public function dateNow(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', new DateTimeZone('Europe/Paris'));
    }

    public function isNewYear()
    {
        return $this->dateNow()->format('z') == 0;
    }
}