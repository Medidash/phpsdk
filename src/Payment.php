<?php

namespace Phil\MedidashPhpsdk;


class Payment extends ApiClient
{
	public function __construct()
	{
		parent::__construct();

	}

	public function createPaymentLog(array $data)
	{
		$this->path = '/payment/logs';
		return $this->execute('POST', $data);
	}


}