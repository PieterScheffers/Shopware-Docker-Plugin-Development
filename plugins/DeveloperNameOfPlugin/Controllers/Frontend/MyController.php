<?php

class Shopware_Controllers_Frontend_MyController extends Enlight_Controller_Action
{
	public function indexAction()
	{
		echo "bla bla";
		exit();
	}

	public function phpinfoAction()
	{
		phpinfo();
		exit();
	}
}