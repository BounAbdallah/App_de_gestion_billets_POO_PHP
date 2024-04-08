<?php

trait Validation
{
    public function validationChaine($chaine)
    {
        if (!empty($chaine)) {
            $regex = '/^[A-Za-z\s]+$/u';
            return preg_match($regex, $chaine);
        } else {
            return false; // Le champ est vide, donc invalide
        }
    }

    public function validationEmail($email)
    {
        if (!empty($email)) {
             return filter_var($email, FILTER_VALIDATE_EMAIL);
        } else {
            return false;
        }
    }

    public function validationTelephone($telephone)
    {
        if (!empty($telephone)) {
            $regex = '';
            return filter_var($telephone, FILTER_VALIDATE_INT);
        }
    }
}