<?php

namespace Medidash\Phpsdk\Services;

class NotificationService extends BaseService
{
	/**
	 * @param array $data
	 * @return array
	 */
	public function createNotification(array $data): array
	{
		return $this->post('notifications', $data);
	}

	/**
	 * @param int   $id
	 * @param array $data
	 * @return array
	 */
	public function notify (array $data): array
	{
		return $this->post('notify/', $data);
	}

}