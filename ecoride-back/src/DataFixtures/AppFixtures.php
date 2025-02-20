<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Voiture;
use App\Entity\Covoiturage;
use App\Entity\Avis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Créer un utilisateur administrateur
        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'adminpassword'));
        $admin->setPseudo('admin');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setRole('admin');
        $manager->persist($admin);

        // Créer un utilisateur employé
        $employe = new User();
        $employe->setEmail('employe@example.com');
        $employe->setPassword($this->passwordHasher->hashPassword($employe, 'employepassword'));
        $employe->setPseudo('employe');
        $employe->setRoles(['ROLE_EMPLOYE']);
        $employe->setRole('employe');
        $manager->persist($employe);

        // Créer plusieurs utilisateurs avec différents rôles
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setEmail('user'. $i. '@example.com');
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
            $user->setPseudo('user'. $i);
            $user->setRole($i % 2 === 0? 'conducteur': 'passager');
            $manager->persist($user);

            // Créer des voitures pour les conducteurs
            if ($i % 2 === 0) {
                $voiture = new Voiture();
                $voiture->setModele('Voiture '. $i);
                $voiture->setImmatriculation('AA-'. $i. $i. $i. '-BB');
                $voiture->setEnergie('essence');
                $voiture->setUtilisateur($user);
                $manager->persist($voiture);

                // Créer des covoiturages pour les conducteurs
                $covoiturage = new Covoiturage();
                $covoiturage->setLieuDepart('Ville '. $i);
                $covoiturage->setLieuArrivee('Ville '. ($i + 1));
                $covoiturage->setDateDepart(new \DateTime('now + '. $i. ' days'));
                $covoiturage->setHeureDepart(new \DateTime('08:00:00'));
                $covoiturage->setPrix(20 + $i);
                $covoiturage->setNombrePlacesDisponibles(4);
                $covoiturage->setConducteur($user);
                $covoiturage->setVoiture($voiture);
                $manager->persist($covoiturage);

                // Créer des avis pour les covoiturages
                $avis = new Avis();
                $avis->setPassager($user); // Utiliser un utilisateur passager existant
                $avis->setConducteur($admin); // Utiliser un utilisateur conducteur existant
                $avis->setCovoiturage($covoiturage); // Utiliser un covoiturage existant
                $avis->setNote(rand(1, 5));
                $avis->setCommentaire('Commentaire test');
                $avis->setDateAvis(new \DateTime('now - '. $i. ' days'));
                $manager->persist($avis);
            }
        }

        $manager->flush();
    }
}