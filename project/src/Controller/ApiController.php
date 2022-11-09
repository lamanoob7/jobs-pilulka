<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TwitterLoaded;

class ApiController extends AbstractController
{
    // index for chosing way to show results
    #[Route('/', name: 'index_page')]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    // JSON response for API 
    #[Route('/api', name: 'api_json_page')]
    public function api(TwitterLoaded $twitterLoader): Response
    {        
        $feeds = $twitterLoader->getFeeds(100);

        return $this->json($feeds);
    }
    
    // User friendly show of results
    #[Route('/html', name: 'api_html_page')]
    public function html(TwitterLoaded $twitterLoader): Response
    {
        $feeds = $twitterLoader->getFeeds(100);

        return $this->render('api.html.twig', [
            'feeds' => $feeds,
        ]);
    }
}