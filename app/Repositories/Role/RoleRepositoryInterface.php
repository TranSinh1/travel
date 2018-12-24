<?php
namespace App\Repositories\Role;

interface RoleRepositoryInterface
{
	public function getAllPublished();

	public function findOnlyPublished();

}
