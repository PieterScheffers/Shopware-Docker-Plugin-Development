<?php
namespace DeveloperNameOfPlugin\Subscriber;

use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use DeveloperNameOfPlugin\Services\SloganPrinter;

class EventSubscriber implements SubscriberInterface
{
    private $sloganPrinter;

    public function __construct(SloganPrinter $sloganPrinter)
    {
        $this->sloganPrinter = $sloganPrinter;
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Front_RouteStartup' => 'onRouteStartup'
        ];
    }

    public function onRouteStartup(\Enlight_Controller_EventArgs $args)
    {
        $this->sloganPrinter->printIt();
    }
}
