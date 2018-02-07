<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {

    //
    public function getJWTCustomClaims(): array {
        return $this->getKey();
    }

    public function getJWTIdentifier() {
        return [];
    }

}
