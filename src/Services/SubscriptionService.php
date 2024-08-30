<?php

namespace Medidash\Phpsdk\Services;

class SubscriptionService extends BaseService
{
	public function getUserSubscriptions(int $userId): array
	{
		return $this->get('subscriptions/user/'.$userId);
	}
}