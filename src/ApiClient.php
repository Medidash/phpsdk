<?php

namespace Medidash\Phpsdk;

use Laminas\Config\Config;
use Laminas\Http\Client;

abstract class ApiClient
{
	protected Config $config;
	protected Client $client;
	protected string $path;

	public function __construct()
	{
		try
		{
			$this->config = new Config(require 'config/medidash.config.php');
			$this->client = new Client();
			$this->client->setEncType('application/json');
		}
		catch (\Exception $e)
		{
			throw new \Exception('Error loading configuration');
		}

	}

	protected function getUrl(): string
	{
		return $this->config->endpoint . $this->path;
	}

	protected function execute(string $method, array $data = []): array
	{
		$this->client->setUri($this->getUrl());
		$this->client->setMethod($method);
		$this->client->setRawBody(json_encode($data));
		$response = $this->client->send();
		return json_decode($response->getBody(), true);
	}

}