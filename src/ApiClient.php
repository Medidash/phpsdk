<?php

namespace Medidash\Phpsdk

use Laminas\Config\Config;
use Laminas\Http\Client;

abstract class ApiClient
{
	protected array $config;
	protected Client $client;
	protected string $endpoint;
	protected string $path;

	public function __construct()
	{
		try
		{
			$this->config = new Config(require 'config/medidash.config.php');
			$this->client = new Client();
			$this->client->setOptions($this->config['http_client_options']);
			$this->endpoint = $this->config['endpoint'];
		}
		catch (\Exception $e)
		{
			throw new \Exception('Error loading configuration');
		}

	}

	protected function getUrl(): string
	{
		return $this->endpoint . $this->path;
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