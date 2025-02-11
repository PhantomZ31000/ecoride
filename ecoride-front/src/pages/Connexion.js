import React from 'react';
import { Container } from 'react-bootstrap';
import ConnexionForm from '../components/ConnexionForm';

function Connexion() {
  return (
    <Container>
      <h1>Connexion</h1>
      <ConnexionForm />
    </Container>
  );
}

export default Connexion;