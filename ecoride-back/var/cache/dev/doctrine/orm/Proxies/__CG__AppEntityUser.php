<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \App\Entity\User implements \Doctrine\ORM\Proxy\InternalProxy
{
     use \Symfony\Component\VarExporter\LazyGhostTrait {
        initializeLazyObject as private;
        setLazyObjectAsInitialized as public __setInitialized;
        isLazyObjectInitialized as private;
        createLazyGhost as private;
        resetLazyObject as private;
    }

    public function __load(): void
    {
        $this->initializeLazyObject();
    }
    

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'adresse' => [parent::class, 'adresse', null],
        "\0".parent::class."\0".'avisConducteur' => [parent::class, 'avisConducteur', null],
        "\0".parent::class."\0".'avisPassager' => [parent::class, 'avisPassager', null],
        "\0".parent::class."\0".'covoituragesConducteur' => [parent::class, 'covoituragesConducteur', null],
        "\0".parent::class."\0".'date_naissance' => [parent::class, 'date_naissance', null],
        "\0".parent::class."\0".'email' => [parent::class, 'email', null],
        "\0".parent::class."\0".'id' => [parent::class, 'id', null],
        "\0".parent::class."\0".'nom' => [parent::class, 'nom', null],
        "\0".parent::class."\0".'password' => [parent::class, 'password', null],
        "\0".parent::class."\0".'photo' => [parent::class, 'photo', null],
        "\0".parent::class."\0".'prenom' => [parent::class, 'prenom', null],
        "\0".parent::class."\0".'pseudo' => [parent::class, 'pseudo', null],
        "\0".parent::class."\0".'role' => [parent::class, 'role', null],
        "\0".parent::class."\0".'roles' => [parent::class, 'roles', null],
        "\0".parent::class."\0".'telephone' => [parent::class, 'telephone', null],
        "\0".parent::class."\0".'voitures' => [parent::class, 'voitures', null],
        'adresse' => [parent::class, 'adresse', null],
        'avisConducteur' => [parent::class, 'avisConducteur', null],
        'avisPassager' => [parent::class, 'avisPassager', null],
        'covoituragesConducteur' => [parent::class, 'covoituragesConducteur', null],
        'date_naissance' => [parent::class, 'date_naissance', null],
        'email' => [parent::class, 'email', null],
        'id' => [parent::class, 'id', null],
        'nom' => [parent::class, 'nom', null],
        'password' => [parent::class, 'password', null],
        'photo' => [parent::class, 'photo', null],
        'prenom' => [parent::class, 'prenom', null],
        'pseudo' => [parent::class, 'pseudo', null],
        'role' => [parent::class, 'role', null],
        'roles' => [parent::class, 'roles', null],
        'telephone' => [parent::class, 'telephone', null],
        'voitures' => [parent::class, 'voitures', null],
    ];

    public function __isInitialized(): bool
    {
        return isset($this->lazyObjectState) && $this->isLazyObjectInitialized();
    }

    public function __serialize(): array
    {
        $properties = (array) $this;
        unset($properties["\0" . self::class . "\0lazyObjectState"]);

        return $properties;
    }
}
