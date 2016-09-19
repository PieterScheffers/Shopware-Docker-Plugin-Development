<?php

class Shopware_Controllers_Frontend_MyController extends Enlight_Controller_Action
{
	public function indexAction()
	{

	}

	public function phpinfoAction()
	{
		phpinfo();
		exit();
	}
}