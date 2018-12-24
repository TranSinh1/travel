<?php
namespace App\Repositories;
interface RoleRepositoryInterface
{
	public function getAllPublished();

	public function findOnlyPublished();
}
