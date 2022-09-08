<?php

namespace App\Controller;

use App\Services\PageServiceController;
use IntlDateFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;


class PageController extends AbstractController
{
    public function __construct(private PageServiceController $pageServiceController)
    {
    }

    public function redirectToLocale(): Response
    {
        return  $this->redirectToRoute('app_home', ['_locale' => 'fr']);
    }

    #[Route('', name: 'app_home')]
    public function index(TranslatorInterface $translator): Response
    {

        $isnewyear = $this->pageServiceController->isNewYear();
        $dayleft = $this->pageServiceController->dayLeftUntilNextYear()->days;
        $currentDate  = $this->pageServiceController->dateNow();

        return $this->render('page/index.html.twig', [
            'dayLeft' => $dayleft,
            'isNewYear' => $isnewyear,
            'currentDate' => $currentDate
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {

        return $this->render('page/about.html.twig');
    }
}