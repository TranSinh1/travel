<?php
namespace App\Repositories\Paymethod;

use App\Repositories\EloquentRepository;

use App\Repositories\Paymethod\PaymethodRepositoryInterface;

class PaymethodEloquentRepository extends EloquentRepository implements PaymethodRepositoryInterface
{
	public function getModel()
	{
		return \App\Paymethod::class;
	}

	public function getAllPublished()
	{
		$result = $this->_model->where('is_published', 1)->get();
		return $result;
	}

	public function findOnlyPublished()
	{
		$result = $this
		->_model
		->where('id', $id)
		->where('is_published', 1)
		->first();
		return $result;
	}
	
}
