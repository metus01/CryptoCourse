<?php

function chiffrementCesar($texte, $decalage) {
    $resultat = "";

    // Parcourir chaque caractère dans le texte
    $longueur = strlen($texte);
    for ($i = 0; $i < $longueur; $i++) {
        $caractere = $texte[$i];

        // Vérifier si le caractère est une lettre
        if (ctype_alpha($caractere)) {
            // Déterminer si le caractère est en majuscule ou en minuscule
            $majuscule = ctype_upper($caractere);
            $caractere = strtoupper($caractere);

            // Appliquer le décalage de César
            $caractereDecale = chr((ord($caractere) - 65 + $decalage) % 26 + 65);

            // Reconvertir en minuscule si nécessaire
            if (!$majuscule) {
                $caractereDecale = strtolower($caractereDecale);
            }

            // Ajouter le caractère décalé au résultat
            $resultat .= $caractereDecale;
        } else {
            // Si le caractère n'est pas une lettre, ajouter tel quel au résultat
            $resultat .= $caractere;
        }
    }

    return $resultat;
}

// Exemple d'utilisation
$texteOriginal = "Bonjour, comment ça va ?";
$decalage = 3;
$texteChiffre = chiffrementCesar($texteOriginal, $decalage);

echo "Texte original: $texteOriginal<br>";
echo "Texte chiffré: $texteChiffre";

?>
