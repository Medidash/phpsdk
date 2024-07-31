<?php

namespace Medidash\Phpsdk\Services;

use Laminas\Config\Config;
use Laminas\Http\Client;

abstract class BaseService
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

	protected function get(string $path): array
	{
		$this->path = $path;
		return $this->execute('GET')?? [];
	}
	protected function post(string $path, array $data): array
	{
		$this->path = $path;
		return $this->execute('POST', $data)??[];
	}
	protected function put(string $path, array $data): array
	{
		$this->path = $path;
		return $this->execute('PUT', $data)??[];
	}

	protected function execute(string $method, array $data = []): ?array
	{
		$this->client->setUri($this->getUrl());
		$this->client->setMethod($method);
		$this->client->setRawBody(json_encode($data));
		$response = $this->client->send();
		return json_decode($response->getBody(), true);
	}

}