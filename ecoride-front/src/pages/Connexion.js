import React from 'react';
import { Container } from 'react-bootstrap';
import ConnexionForm from '../components/ConnexionForm';
import './Connexion.css';
import Footer from '../components/Footer'; 

function Connexion() {
  return (
<div> 
  <Container>
    <h1>Connexion</h1>
    <ConnexionForm /> 
  </Container> 
  <Footer />
</div>
  );
}

export default Connexion;