<?php

namespace Lanoda;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['contact_id', 'type_id', 'title', 'body'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * A Note is owned by a Contact
     *
     * @return \Illumintae\Database\Eloquent\Relations\BelongsTo
     */
    public function contact() 
    {
        return $this->belongsTo('Lanoda\Contact');
    }

    /**
     * A Note can have many Tags
     *
     * @return \Illumintae\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('Lanoda\Tag');
    }
}
