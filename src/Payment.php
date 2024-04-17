<?php

namespace Medidash\Phpsdk;


class Payment extends ApiClient
{
	public function __construct()
	{
		parent::__construct();

	}

	public function createPaymentLog(array $data)
	{
		$this->path = 'payments/log';
		return $this->execute('POST', $data);
	}


}