<?php

namespace Medidash\Phpsdk\Services;

class OrderService extends BaseService
{
	public function updateStatus(int $id, string $status): array
	{
		return $this->put('orders/status/'.$id, ['status' => $status]);
	}
}