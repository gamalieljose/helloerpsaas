<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BankAccount
 *
 * @property $id
 * @property $business_id
 * @property $holder_name
 * @property $bank_name
 * @property $account_number
 * @property $opening_balance
 * @property $contact_number
 * @property $bank_address
 * @property $created_by
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BankAccount extends Model
{
    
    static $rules = [
		'business_id' => 'required',
		'holder_name' => 'required',
		'bank_name' => 'required',
		'account_number' => 'required',
		'opening_balance' => 'required',
		'contact_number' => 'required',
		'bank_address' => 'required',
		'created_by' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['business_id','holder_name','bank_name','account_number','opening_balance','contact_number','bank_address','created_by'];



}
