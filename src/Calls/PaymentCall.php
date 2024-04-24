<?php

namespace Medidash\Phpsdk\Calls;

class PaymentCall extends Base
{


	public function createPaymentLog(array $data): array
	{
		$this->path = 'payments/log';
		return $this->execute('POST', $data);
	}

	public function updatePaymentLog(int $id, array $data): array
	{
		$this->path = 'payments/log/'.$id;
		return $this->execute('PUT', $data);
	}


}