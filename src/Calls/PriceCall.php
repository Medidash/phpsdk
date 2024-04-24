<?php

namespace Medidash\Phpsdk\Calls;
use Medidash\Phpsdk\Collections\PriceCollection;

class PriceCall extends Base
{

	public function update(PriceCollection $prices): array
	{
		$this->path = 'price';
		return $this->execute('POST', $prices->toArray());
	}

}