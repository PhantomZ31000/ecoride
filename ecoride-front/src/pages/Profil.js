import React from 'react';
import { Container } from 'react-bootstrap';
import UserProfile from '../components/UserProfile';
import UserTrajets from '../components/UserTrajets';
import UserAvis from '../components/UserAvis';

function Profil() {
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