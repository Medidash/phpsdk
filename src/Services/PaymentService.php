<?php

namespace Medidash\Phpsdk\Services;

class PaymentService extends BaseService
{
	/**
	 * @param array $data
	 * @return array
	 */
	public function createPaymentLog(array $data): array
	{
		return $this->post('payments/log', $data);
	}

	/**
	 * @param int   $id
	 * @param array $data
	 * @return array
	 */
	public function updatePaymentLog(int $id, array $data): array
	{
		return $this->put('payments/log/'.$id, $data);
	}
}