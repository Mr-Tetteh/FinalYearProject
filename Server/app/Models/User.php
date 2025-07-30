<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * @OA\Schema(
     *      schema="User",
     *      required={"first_name", "last_name", "other_names", "birthday", "gender",
     *     "role", "contact", "email", "hospital", "staff_id", "city"},
     *
     *      @OA\Property(
     *          property="first_name",
     *          description="The first name of the user",
     *          type="string",
     *      ),
     *      @OA\Property(
     *          property="last_name",
     *          description="The last name of the user",
     *          type="string",
     *      ),
     *      @OA\Property(
     *          property="other_names",
     *          description="Other names of the user",
     *          type="string",
     *      ),
     *      @OA\Property(
     *          property="birthday",
     *          description="The birthday of the user",
     *          type="string",
     *          format="date",
     *      ),
     *      @OA\Property(
     *          property="gender",
     *          description="The gender of the user",
     *          type="string",
     *      ),
     *      @OA\Property(
     *          property="role",
     *          description="The role of the user",
     *          type="string",
     *      ),
     *      @OA\Property(
     *          property="contact",
     *          description="The contact number of the user",
     *          type="string",
     *      ),
     *      @OA\Property(
     *          property="email",
     *          description="The email address of the user",
     *          type="string",
     *          format="email",
     *      ),
     *      @OA\Property(
     *          property="hospital",
     *          description="The hospital associated with the user",
     *          type="string",
     *      ),
     *      @OA\Property(
     *          property="staff_id",
     *          description="The staff ID of the user",
     *          type="string",
     *      ),
     *      @OA\Property(
     *          property="city",
     *          description="The city of the user",
     *          type="string",
     *      ),
     * )
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'other_names',
        'contact',
        'birthday',
        'gender',
        'hospital_id',
        'role',
        'email',
        'staff_id',
        'password',

    ];
    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function booted()
    {
        static::creating(function ($record): void {
            $user = auth()->user();
            if ($user && $user->role === 'Doctor') {
                $record->user_id = $user->id;
            }
            if (empty($record->hospital_id) && Auth::check()) {
                $record->hospital_id = Auth::user()->hospital_id;
            }
        });
    }

    public function Sluggable(): array
    {
        return [
            'hospital_id' => [
                'source' => Auth::user()->hospital_id,
            ],
        ];

    }

    public function hospital(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Hospital::class);

    }
}
