<?php

namespace Medidash\Phpsdk\Services;

class SubscriptionService extends BaseService
{
	public function getUserSubscription(int $userId): array
	{
		return $this->get('subscriptions/user/'.$userId);
	}
}