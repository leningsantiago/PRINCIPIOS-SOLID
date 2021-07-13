<?php

#Ejemplo

interface UserRepository {
    /** 
     * @return collection
     */
    public function getUserData($userId);
}

class NormalUserRepository implements UserRepository {
    public function getUserData($userId) {
        return DB::Table('users')->where('user_id', '=', $userId);
    }
}

class FilesystemUserRepository implements UserRepository {
    public function getUserData($userId) {
        return filesystem::getUserInformation($userId)
    }
}



?>