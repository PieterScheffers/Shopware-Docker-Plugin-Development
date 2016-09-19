<?php
namespace DeveloperNameOfPlugin;

use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\DeactivateContext;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use Shopware\Components\Plugin\Context\UninstallContext;

class DeveloperNameOfPlugin extends \Shopware\Components\Plugin
{
    //Provides the Events to which this plugin listens and the corresponding methods to call
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Front_StartDispatch' => 'onStartDispatch',

            'Enlight_Controller_Dispatcher_ControllerPath_Frontend_MyController' => 'registerController',
        ];
    }
    
    public function onStartDispatch()
    {
        require_once $this->getPath() . '/vendor/autoload.php';
    }

    public function registerController(\Enlight_Event_EventArgs $args)
    {
        $this->container->get('Template')->addTemplateDir(
            $this->getPath() . '/Resources/views/'
        );

        return $this->getPath() . "/Controllers/Frontend/MyController.php";
    }

    public function install(InstallContext $context)
    {
        $this->createSchema();
        parent::install($context);
        return true;
    }

    public function update(UpdateContext $context)
    {
        parent::update($context);
        return true;
    }

    public function activate(ActivateContext $context)
    {
        parent::activate($context);
        return true;
    }

    public function deactivate(DeactivateContext $context)
    {
        parent::deactivate($context);
        return true;
    }

    public function uninstall(UninstallContext $context)
    {
        $this->removeSchema();
        parent::uninstall($context);
        return true;
    }

    /**
     * creates database tables on base of doctrine models
     */
    private function createSchema()
    {
        $tool = new SchemaTool($this->container->get('models'));

        $classes = [
            $this->container->get('models')->getClassMetadata(BlogEntry::class)
        ];

        $tool->createSchema($classes);
    }
    private function removeSchema()
    {
        $tool = new SchemaTool($this->container->get('models'));

        $classes = [
            $this->container->get('models')->getClassMetadata(BlogEntry::class)
        ];

        $tool->dropSchema($classes);
    }
}
