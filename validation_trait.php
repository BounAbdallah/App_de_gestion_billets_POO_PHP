<?php
function validateName($name) {
    // Validation du nom et prénom : autoriser uniquement les lettres et les espaces
    return preg_match("/^[a-zA-ZÀ-ÿ\s\-']+$/", $name);
}

function validateEmail($email) {
    // Utilisation de filter_var avec FILTER_VALIDATE_EMAIL pour valider l'adresse e-mail
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePhoneNumber($phoneNumber) {
    // Utilisation d'une expression régulière pour valider le numéro de téléphone
    // Ici, nous autorisons uniquement les chiffres, espaces, parenthèses, signe plus et signe moins
    return preg_match("/^[0-9\s\+\(\)-]+$/", $phoneNumber);
}

// Exemple d'utilisation
$nom = "Doe";
$prenom = "John";
$email = "example@example.com";
$telephone = "+1234567890";

if (validateName($nom) && validateName($prenom)) {
    echo "Le nom et le prénom sont valides.";
} else {
    echo "Le nom et/ou le prénom sont invalides.";
}

echo "<br>";

if (validateEmail($email)) {
    echo "L'adresse e-mail est valide.";
} else {
    echo "L'adresse e-mail est invalide.";
}

echo "<br>";

if (validatePhoneNumber($telephone)) {
    echo "Le numéro de téléphone est valide.";
} else {
    echo "Le numéro de téléphone est invalide.";
}
?>
