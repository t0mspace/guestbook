<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Repository\ConferenceRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    private Environment $twig;
    private ConferenceRepository $conferenceRepository;

    public function __construct(Environment $twig, ConferenceRepository $conferenceRepository)
    {
        $this->twig = $twig;
        $this->conferenceRepository = $conferenceRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            ControllerEvent::class => 'onControllerEvent',
        ];
    }

    public function onControllerEvent(ControllerEvent $event): void
    {
        $this->twig->addGlobal('conferences', $this->conferenceRepository->findAll());
    }
}
