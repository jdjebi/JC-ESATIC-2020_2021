<?php

namespace App\RESAC\Core\Forms;

class FormError{
  const empty_field = "Veuillez remplir ce champs.";
  const email_format = "Format de l'adresse E-mail incorrecte.";
  const email_unique = "Adresse E-mail déjà utilisée.";
  const username_unique = 'Identifiant déjà utilisé.';
  const login_code_unique = 'Code de connexion déjà utilisé.';
}