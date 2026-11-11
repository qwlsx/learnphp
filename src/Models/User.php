<?php

namespace App\Models;

class User extends Model {
    protected static $table = 'users';

    public $name;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;
}
