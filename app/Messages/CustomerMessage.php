<?php

namespace App\Messages;

use App\Messages\BaseMessage;
use App\Services\CustomerService;

class CustomerMessage extends BaseMessage
{
	public function __construct(
		protected CustomerService $customerService,
	) {}

	protected function modelName(): string
	{
		return $this->customerService->modelName();
	}

	/**
	 * Create customer duplicate message.
	 */
	public function createDuplicateError(): string
	{
		return "Customer email is already registered.";
	}
}
