<?php
class UserManager{
    private $_db;

    public function __construct($db){
        $this->setDB($db);
    }

    public function createUser(User $user){
        //* Vérification des doublons d'adresse mail
        $req = $this->_db->prepare("SELECT * FROM users WHERE email = :email");
        $req->bindValue(':email', $user->getEmail());
        $req->execute();
        $result = $req->rowCount();
        if ($result > 0) {
            return "Cette adresse mail est déjà utilisé.";
        }

        $req = $this->_db->prepare('INSERT INTO users(lastname, firstname, email, password, birthdate, active, pp, categorie) VALUES (:lastname, :firstname, :email, :password, :birthdate, 1, :pp, 1)');
        $req->bindValue(':lastname', $user->getLastname());
        $req->bindValue(':firstname', $user->getFirstname());
        $req->bindValue(':email', $user->getEmail());
        $req->bindValue(':password', $user->getPassword());
        $req->bindValue(':birthdate', $user->getBirthdate());
        $req->bindValue(':pp', $user->getPp());
        try
        {
        $req->execute();
        echo '<script>location.href="inscription-reussie.php";</script>';
        }
        catch(PDOException $e)
        {
         echo"<br> Erreur:". $e->getMessage();
        }
    }

    public function delete(User $user){
        $req = $this->_db->prepare('DELETE FROM users WHERE id = :id AND active = 0 AND categorie != 7');
        $req->bindValue(':id', $user->getId());
        $req->execute();
    }

    public function update(User $user){
        $req = $this->_db->prepare('UPDATE users SET lastname = :lastname, firstname = :firstname, email = :email, password = :password, birthdate = :birthdate, active = :active, categorie = :categorie, pp = :pp WHERE id = :id');
        $req->bindValue(':lastname', $user->getLastname());
        $req->bindValue(':firstname', $user->getFirstname());
        $req->bindValue(':email', $user->getEmail());
        $req->bindValue(':password', $user->getPassword());
        $req->bindValue(':birthdate', $user->getBirthdate());
        $req->bindValue(':pp', $user->getPp());
        $req->execute();
        $_SESSION['login'] = true;
        $_SESSION['firstname'] = htmlentities($user->getFirstname());
        $_SESSION['lastname'] = htmlentities($user->getLastname());
        $_SESSION['email'] = htmlentities($user->getEmail());
        $_SESSION['birthdate'] = htmlentities($user->getBirthdate());
        $_SESSION['categorie'] = htmlentities($user->getCategorie());
        $_SESSION['pp'] = htmlentities($user->getPp());
    }
    
    public function getUserById($id){
        $req = $this->_db->prepare('SELECT * FROM users WHERE id = '.$id.'');
        $req->execute();
        $donnees = $req->fetch();
        return new User($donnees);
    }

    public function connexion(User $user){
        $sql = 'SELECT id FROM users WHERE email = :email AND password = :password AND active > 0';
        $sql = $this->_db->prepare($sql);
        $sql->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $sql->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $sql->execute();
        $num = $sql->fetchAll();
        if (count($num)>0)
        {
            $_SESSION['login'] = true;

            $req = $this->_db->prepare("SELECT * from users where email = :email");
            $req->bindValue(':email', $user->getEmail());
            $req->execute();
            $result = $req->fetch();
            $_SESSION['id'] = htmlentities($result['id']); //ID de l'utilisateur
            $_SESSION['firstname'] = htmlentities($result['firstname']); //Prenom de l'utilisateur
            $_SESSION['lastname'] = htmlentities($result['lastname']); //Nom de famille de l'utilisateur
            $_SESSION['email'] = htmlentities($result['email']); //Email de l'utilisateur
            $_SESSION['categorie'] = htmlentities($result['categorie']); //Catégorie de l'utilisateur (1,3,7)
            $_SESSION['pp']= htmlentities($result['pp']); //Photo de profil de l'utilisateur
            $_SESSION['birthdate']= htmlentities($result['birthdate']); //Date de naissance de l'utilisateur
            
            //On crée un cookie de connexion
            if(!empty($_POST["remember-me"])) {
                setcookie ("connexion_microworld",$_SESSION['login'] && $_SESSION['email'],time()+ (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE["connexion_microworld"])) {
                    setcookie ("connexion_microworld","");
                }
            }
            unset($result);
            echo '<script>location.href="connexion-reussie";</script>';
            }
        else
        {
            $userInconnu = true;
        }
    }
    
    public function setDB(PDO $db){
        $this->_db = $db;
    }

    public function desactivateUser(User $user){
        $req = $this->_db->prepare('UPDATE users SET active = 0 WHERE id = :id');
        $req->bindValue(':id', $user->getId());
        $req->execute();
    }

    public function activateUser(User $user){
        $req = $this->_db->prepare('UPDATE users SET active = 1 WHERE id = :id');
        $req->bindValue(':id', $user->getId());
        $req->execute();
    }
    
    public function getUsers(){
        $users = [];
        $req = $this->_db->query('SELECT * FROM users');
        while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
            $users[] = new User($donnees);
        }
        return $users;
    }




}

?>