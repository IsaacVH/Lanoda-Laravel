<?php

namespace Lanoda;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image_id',
        'url_name',
        'firstname',
        'middlename',
        'lastname',
        'phone',
        'email',
        'address',
        'age',
        'birthday'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * A Contact is owned by a User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() 
    {
        return $this->belongsTo('Lanoda\User');
    }

    /**
     * A Contact has a primary Image
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->belongsTo('Lanoda\Image');
    }

    /**
     * A Contact has a Contact Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contact_types()
    {
        return $this->belongsToMany('Lanoda\ContactType', 'contact_contact_type');
    }

    /**
     * A Contact has secondary images
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contact_images()
    {
        return $this->hasMany('Lanoda\Images');
    }

    /**
     * A Contact can have many Notes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany('Lanoda\Note');
    }
}
