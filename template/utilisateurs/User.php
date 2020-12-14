<?php

class Utilisateur{

    private $identifiant;
    private $pseudo;
    private $motdepasse;
  

    function __construct(string $identifiant, string $pseudo, string $motdepasse,) {
        $this->identifiant = $identifiant;
        $this->pseudo= $pseudo;
        $this->motdepasse = $motdepasse;
       

    function saveBook() {

        echo "Je récupère le contenu de mon fichier livres.json :<br>";
        $contenu = file_get_contents("datas/livres.json");
        var_dump($contenu);

        echo "Je décode mon JSON en structure PHP (tableau associatif) :<br>";
        $livres = json_decode($contenu);
        var_dump($livres);

        echo "Je crée un tableau avec mon objet courant : <br>";
        $livre = get_object_vars($this);
        var_dump($livre);

        echo "J'ajoute ce livre à mon tableau de livres (\$livres)";
        array_push($livres, get_object_vars($this));
        var_dump($livres);

        echo "J'ouvre mon fichier livres.json <br>";
        $handle = fopen("datas/livres.json", "w");

        echo "Je réencode mon tableau au format JSON : <br>";
        $json = json_encode($livres);
        var_dump($json);

        echo "J'écris ma chaîne JSON dans mon fichier livres.json<br>";
        fwrite($handle, $json);
        echo "Je ferme mon fichier !";
        fclose($handle);
    }
}