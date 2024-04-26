<?php

namespace Medidash\Phpsdk\Services;
use Medidash\Phpsdk\Collections\PriceCollection;

class PriceService extends BaseService
{
	/**
	 * @param PriceCollection $prices
	 * @return array
	 */
	public function update(PriceCollection $prices): array
	{
		return $this->post('price', $prices->toArray());
	}
}