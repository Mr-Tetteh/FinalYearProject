<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Hospital",
 *      required={"hospital_name", "hospital_address", "hospital_contact", "hospital_email", "hospital_country",
 *     "hospital_city", "user_name", "user_phone_number", "user_email"},
 *
 *      @OA\Property(
 *          property="hospital_name",
 *          description="The name of the hospital",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="hospital_address",
 *          description="The address of the hospital",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="hospital_location",
 *          description="The location or area where the hospital is situated",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="hospital_contact",
 *          description="Contact number of the hospital",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="hospital_email",
 *          description="Email address of the hospital",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="hospital_country",
 *          description="The country where the hospital is located",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="hospital_city",
 *          description="The city where the hospital is located",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="user_name",
 *          description="The name of the user or contact person at the hospital",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="user_phone_number",
 *          description="Phone number of the user/contact person",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="user_email",
 *          description="Email address of the user/contact person",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="number_of_monthly_subscription",
 *          description="The number of monthly subscriptions associated with the hospital",
 *          readOnly=false,
 *          nullable=true,
 *          type="integer",
 *      )
 * )
 */
class Hosptial extends Model
{
    /** @use HasFactory<\Database\Factories\HosptialFactory> */
    use HasFactory;

    protected $fillable = ['hospital_name', 'hospital_address', 'hospital_location',
        'hospital_contact', 'hospital_email', 'hospital_country', 'status',
        'hospital_city', 'number_of_monthly_subscription'];
}
