<?php

namespace Lanoda;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'color'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * A Tag can have many Notes
     *
     * @return \Illumintae\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('Lanoda\Note');
    }
}
