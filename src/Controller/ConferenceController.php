<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return new Response(<<<EOL
<html>
    <body>
        <img src="/images/under-construction.gif" />
    </body>
</html>
EOL

        );
    }
}
