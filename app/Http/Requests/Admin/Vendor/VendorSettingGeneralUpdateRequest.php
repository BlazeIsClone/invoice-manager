<?php

namespace App\Http\Requests\Admin\Vendor;

use App\Http\Requests\BaseRequest;

class VendorSettingGeneralUpdateRequest extends BaseRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'logo' => [
				'nullable',
				'string',
			],
			'address' => [
				'nullable',
				'string',
				'max:255',
			],
			'bank_account_details' => [
				'nullable',
				'string',
				'max:255',
			],
		];
	}
}
