<?php
namespace DeveloperNameOfPlugin\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\DependencyInjection\Container;

class MyControllerSubscriber implements SubscriberInterface
{
    /**
     * @var Container
     */
    private $container;

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Dispatcher_ControllerPath_Frontend_MyController' => 'onMyController'
        ];
    }

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function onMyController()
    {
        $this->container->get('template')->addTemplateDir(
            $this->container->getParameter('developer_name_of_plugin.plugin_dir') . '/Resources/views/'
        );

        return $this->container->getParameter('developer_name_of_plugin.plugin_dir') . '/Controllers/Frontend/Profiler.php';
    }
}
