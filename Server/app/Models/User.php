<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'date_of_birth',
        'gender',
//        'hospital_id',
        'position',
        'status',
        'email',
        'unique_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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

    public function Sluggable(): array
    {
        return [
            'unique_id' => [
                'source' => 'unique_id',
            ],
        ];

    }

    protected static function booted()
    {
        static::creating(function ($record): void {
        /*    $user = auth()->user();
            if ($user && $user->role === 'Doctor') {
                $record->user_id = $user->id;
            }
            if (empty($record->hospital_id) && Auth::check()) {
                $record->hospital_id = Auth::user()->hospital_id;
            }*/
        });
        static::creating(function ($user): void{
            $user->unique_id = $user->generateUnique_id();
        });
    }


    public function generateUnique_id()
    {
        $length = 7;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $unique_id = '';

        for ($i = 0; $i < $length; $i++) {
            $unique_id .= $characters[random_int(0, strlen($characters) - 1)];
        }

        // Check if the generated patient number already exists in the database
        while (User::where('unique_id', $unique_id)->exists()) {
            $unique_id = '';
            for ($i = 0; $i < $length; $i++) {
                $unique_id .= $characters[random_int(0, strlen($characters) - 1)];
            }
        }
        return $unique_id;
    }


    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class)->withTimestamps();
    }
}
