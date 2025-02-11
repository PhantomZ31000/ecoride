import React from 'react';
import { Container } from 'react-bootstrap';
import PropositionForm from '../components/PropositionForm';

function Proposition() {
  return (
    <Container>
      <h1>Proposer un trajet</h1>
      <PropositionForm />
    </Container>
  );
}

export default Proposition;