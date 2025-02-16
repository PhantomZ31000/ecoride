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
    .then(data => setUser(data));
  },);
  return (
    <Container>
      <h1>Mon Profil</h1>
      <UserProfile />
      <UserTrajets />
      <UserAvis />
    </Container>
  );
}

export default Profil;