<?php

namespace Medidash\Phpsdk\Services;
use Medidash\Phpsdk\Collections\PharmacyCollection;

class PharmacyService extends BaseService
{
	/**
	 * @return PharmacyCollection
	 */
	public function getInactive(): PharmacyCollection
	{
		$response = $this->get('pharmacy');
		$collection =  (new PharmacyCollection())->addAll($response);
		$collection->filter(function ($pharmacy) {
			return ! $pharmacy->isActive();
		});
		return $collection;
	}

	/**
	 * @param int $pharmacyId
	 * @return bool
	 */
	public function setActive(int $pharmacyId): bool
	{
		$response = $this->put('pharmacy/'.$pharmacyId, ['active' => true]);
		return $response['code'] == 'success';
	}

	/**
	 * @return PharmacyCollection
	 */
	public function all(): PharmacyCollection
	{
		$response = $this->get('pharmacy');
		return (new PharmacyCollection())->addAll($response);
	}

	/**
	 * @return array
	 */
	public function getByProvince(): array
	{
		return $this->get('pharmacy/provinces');
	}
	/**
	 * @param int $pharmacyId
	 * @return array
	 */
	public function activate(int $pharmacyId): array
	{
		$data = ['active' => '1'];
		return $this->put('pharmacy/'.$pharmacyId, $data);
	}

	/**
	 * @param int $pharmacyId
	 * @return array
	 */
	public function deactivate(int $pharmacyId): array
	{
		$data = ['active' => '0'];
		return $this->put('pharmacy/'.$pharmacyId, $data);
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function create(array $data): array
	{
		return $this->post('pharmacy', $data);
	}
}