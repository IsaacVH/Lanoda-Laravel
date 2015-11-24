<?php

namespace Lanoda;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'mime_type',
        'size'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the image url
     *
     * @return string
     */
    public function url() {
        return $this->getImageFile();
    }
}
