<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    protected $with = ["role"];
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "role_id",
        "profile_picture"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function studentData(): hasOne
    {
        return $this->HasOne(StudentData::class, "user_id", "id");
    }

    public function professorData(): HasOne
    {
        return $this->hasOne(ProfessorData::class, "user_id", "id");
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, "courses_users");
    }

    public function profesorCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, "course_proffesor", "professor_id", "id");
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
