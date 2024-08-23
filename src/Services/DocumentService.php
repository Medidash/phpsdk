<?php

namespace Medidash\Phpsdk\Services;

class DocumentService extends BaseService
{

	public function pharmacyDocuments(int $pharmacyId): array
	{
		return $this->get("documents/{$pharmacyId}");
	}

}