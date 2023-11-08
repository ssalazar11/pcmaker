<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * COMMENT ATTRIBUTES
     * $this->attributes['id'] - int - contains the comment primary key (id)
     * $this->attributes['product_id'] - int - contains the product primary key (id)
     * $this->attributes['user_id'] - int - contains the user primary key (id)
     * $this->attributes['text'] - string - contains the comment text
     * $this->attributes['created_at'] - timestamp - contains the comment creation date
     * $this->attributes['updated_at'] - timestamp - contains the comment update date 
     * $this->product - Product - contains the associated Product
     * $this->user - User - contains the associated User
     */
    protected $fillable = [
        'text',
        'product_id',
        'user_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getText(): string
    {
        return $this->attributes['text'];
    }

    public function setText(string $text): void
    {
        $this->attributes['text'] = $text;
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

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function setProductId(int $pId): void
    {
        $this->attributes['product_id'] = $pId;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $uId): void
    {
        $this->attributes['user_id'] = $uId;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
