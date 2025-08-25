<?php
// création d'une function de connexion à la db
function dbConnexion() {
    $host = "localhost";
    $dbname = "books_db";
    $username  = "root";
    $password = "";
    $encodage = "utf8mb4";
    // le "try" permet d'essayer de se connecter à la db
    try {
        // création de pdo
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$encodage";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        $pdo->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_ASSOC
        );
        // rend le pdo si la function est appelé et si la connexion est réussite
        return $pdo;
        
    } 
    // Si la connexion n'est pas réussite alors on renvoie l'erreur en message 
    catch (PDOException $error) {
        die("Erreur durant la connexion à la database: " . $error->getMessage());
    }
    
}

?>