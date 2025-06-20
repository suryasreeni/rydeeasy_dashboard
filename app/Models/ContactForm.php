<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{

    protected $table = 'contact_forms';
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'group',
        'filename',
        'mobile',
        'other_mobile',
        'address1',
        'address2',
        'city',
        'state',
        'pincode',
        'country',
        'jobtitle',
        'dob',
        'licensenum',
        'licensestate',
    ];

}