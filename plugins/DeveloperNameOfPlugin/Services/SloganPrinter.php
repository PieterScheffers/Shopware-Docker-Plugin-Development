<?php

namespace SwagSloganOfTheDay\Services;

class SloganPrinter
{
	protected $db;
	protected $em;

	public function __construct($db, $entityManager)
	{
		$this->db = $db;
		$this->em = $entityManager;
	}

	public function printIt()
	{
		$rows = $this->db->executeQuery("SELECT * FROM s_articles WHERE description LIKE :description", [ ':description' => "%shoe%" ]);
	}
}