<?php
namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof User) {
            return;
        }

        // Vérification si le compte est actif
        if (!$user->isVerified()) {
            throw new CustomUserMessageAuthenticationException(
                'Votre compte est inactif. Veuillez contacter l\'administration.'
            );
        }
    }

    public function checkPostAuth(UserInterface $user): void
    {
        // Aucune vérification spécifique après l'authentification
    }
}
