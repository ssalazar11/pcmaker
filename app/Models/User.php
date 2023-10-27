<?php

namespace App\Models;
use App\Models\Comment;
use App\Models\Interview;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['address'] - string - contains the user address
     * $this->attributes['balance'] - int - contains the user balance money
     * $this->attributes['phoneNumber'] - string - contains the user phone number
     * $this->comments - Comment[] - contains the associated comments
     * $this->interviews - Interview[] - contains the associated interviews
     * $this->orders - Order[] - contains the associated orders
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'balance',
        'phoneNumber',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }


    public function setEmail($email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword($password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole($role): void
    {
        $this->attributes['role'] = $role;
    }

    public function getBalance(): int
    {
        return $this->attributes['balance'];
    }

    public function setBalance($balance): void
    {
        $this->attributes['balance'] = $balance;
    }

    public function getPhoneNumber(): string
    {
        return $this->attributes['phoneNumber'];
    }

    public function setPhoneNumber($phoneNumber): void
    {
        $this->attributes['phoneNumber'] = $phoneNumber;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress($address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function setComments(Collection $comments): void
    {
        $this->comments = $comments;
    }

    public function interviews(): HasMany
    {
        return $this->hasMany(Interview::class);
    }

    public function getInterviews(): Collection
    {
        return $this->interviews;
    }

    public function setInterviews(Collection $interviews):void
    {
        $this->interviews = $interviews;
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders):void
    {
        $this->orders = $orders;
    }

}