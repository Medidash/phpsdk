<?php

namespace Medidash\Phpsdk;


class Payment extends ApiClient
{
	public function __construct()
	{
		parent::__construct();

	}

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