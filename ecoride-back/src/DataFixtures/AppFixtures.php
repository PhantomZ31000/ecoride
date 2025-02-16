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
        // Créer des utilisateurs
        $user1 = new User();
        $user1->setEmail('user1@example.com');
        $user1->setPassword($this->passwordHasher->hashPassword($user1, 'password'));
        $user1->setPseudo('user1');
        $user1->setRole('conducteur');
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('user2@example.com');
        $user2->setPassword($this->passwordHasher->hashPassword($user2, 'password'));
        $user2->setPseudo('user2');
        $user2->setRole('passager');
        $manager->persist($user2);

        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'adminpassword'));
        $admin->setPseudo('admin');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setRole('admin'); // Assurez-vous que le rôle est défini comme 'admin'
        $manager->persist($admin);

        $employe = new User();
        $employe->setEmail('employe@example.com');
        $employe->setPassword($this->passwordHasher->hashPassword($employe, 'employepassword'));
        $employe->setPseudo('employe');
        $employe->setRoles(['ROLE_EMPLOYE']);
        $employe->setRole('employe'); // Assurez-vous que le rôle est défini comme 'employe'
        $manager->persist($employe);

        // Créer des voitures
        $voiture1 = new Voiture();
        $voiture1->setModele('Clio');
        $voiture1->setImmatriculation('AA-123-BB');
        $voiture1->setEnergie('essence');
        $voiture1->setUtilisateur($user1);
        $manager->persist($voiture1);

        // Créer des covoiturages
        $covoiturage1 = new Covoiturage();
        $covoiturage1->setLieuDepart('Toulouse');
        $covoiturage1->setLieuArrivee('Paris');
        $covoiturage1->setDateDepart(new \DateTime('2025-03-15'));
        $covoiturage1->setHeureDepart(new \DateTime('08:00:00'));
        $covoiturage1->setPrix(50.00);
        $covoiturage1->setNombrePlacesDisponibles(3);
        $covoiturage1->setConducteur($user1);
        $covoiturage1->setVoiture($voiture1);
        $manager->persist($covoiturage1);

        // Créer des avis
        $avis1 = new Avis();
        $avis1->setPassager($user2);
        $avis1->setConducteur($user1);
        $avis1->setCovoiturage($covoiturage1);
        $avis1->setNote(4);
        $avis1->setCommentaire('Super trajet!');
        $avis1->setDateAvis(new \DateTime());
        $manager->persist($avis1);

        $manager->flush();
    }
}