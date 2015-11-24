<?php

namespace Lanoda;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_types';

    /**
     * A ContactType can have many contacts
     *
     * @return \Illumintae\Database\Eloquent\Relations\BelongsToMany
     */
    public function contacts()
    {
        return $this->belongsToMany('Lanoda\Contact', 'contact_contact_type');
    }
}
