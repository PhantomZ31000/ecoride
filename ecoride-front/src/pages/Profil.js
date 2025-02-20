import React, { useState, useEffect } from 'react';
import { Container } from 'react-bootstrap';
import UserProfile from '../components/UserProfile';
import UserTrajets from '../components/UserTrajets';
import UserAvis from '../components/UserAvis';

function Profil() {
  const [user, setUser] = useState(null);

  useEffect(() => {
    // Récupérer les informations de l'utilisateur depuis l'API
    fetch('/api/users/1') // Remplacez 1 par l'ID de l'utilisateur connecté
      .then(response => response.json())
      .then(data => setUser(data))
      .catch(error => {
        // Gérer l'erreur ici, si nécessaire
        console.error('Erreur lors de la récupération des données utilisateur:', error);
      });
  }, []); // Le tableau vide signifie que l'effet ne sera exécuté qu'une seule fois, lors du premier rendu.

  if (!user) {
    return <div>Chargement...</div>; // Afficher un message de chargement pendant que les données sont récupérées
  }

  return (
    <Container>
      <h1>Mon Profil</h1>
      <UserProfile user={user} /> {/* Passez les données de l'utilisateur à ce composant */}
      <UserTrajets user={user} /> {/* Passez les données de l'utilisateur à ce composant */}
      <UserAvis user={user} /> {/* Passez les données de l'utilisateur à ce composant */}
    </Container>
  );
}

export default Profil;
