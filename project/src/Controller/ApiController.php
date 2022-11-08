<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TwitterLoaded;

class ApiController extends AbstractController
{
    #[Route('/api')]
    public function index(TwitterLoaded $twitterLoader): Response
    {
        $messages = [];

        dump($twitterLoader->getFeeds());

        // return new Response(
        //     '<html><body>Lucky number: '.$number.'</body></html>'
        // );
        return $this->render('api.html.twig', [
            'messages' => $messages,
        ]);
    }
}