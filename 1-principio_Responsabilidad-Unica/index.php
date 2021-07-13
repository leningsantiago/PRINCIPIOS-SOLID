
<?php

#Principio de Responsabilidad Única

#Una clase debería tener una, y solo una, razón para cambiar**

#El principio de Responsabilidad Única nos viene a decir que un objeto debe realizar una única cosa.
#Es muy habitual, si no prestamos atención a esto, que acabemos teniendo clases que tienen varias
#responsabilidades lógicas a la vez.

#Ejercicio: 



#Forma incorrecta

class User {
 
    protected function formatResponse(User $user) {
        return [
          "name"     => $user->name,
          "userName" => $user->username,
          "rank"     => $user->rank,
          "score"    => $user->score
        ];
    }
 
    protected function validateUser(User $user) {
        if ($user) {
          return true;
        } else {
          throw new UnknownUserException("User doesn`t exist");
        }
    }
 
    protected function fetchUserFromDatabase($userId) {
        return $this->userRepository->find($userId);
    }
 
}


#Forma correcta


class User {
    ...
}

class UserFormatter {
    protected function toArray(User $user) {
        return [
          "name"     => $user->name,
          "userName" => $user->username,
          "rank"     => $user->rank,
          "score"    => $user->score
        ];
    }
}

class UserValidator {
    protected function validate(User $user) {
        if ($user->name) {
          return true;
        } else {
          throw new NameRequiredException("Name is required");
        }
    }
}

class UserRepository {
    protected function fetchUserFromDatabase($userId) {
        return $this->userRepository->find($userId);
    } 
}

?>