import React from 'react';
import { Container, Row, Col, Button } from 'react-bootstrap';
import SearchForm from './SearchForm';
import './HeroSection.css'; // Importez le fichier CSS

function HeroSection() {
  return (
    <section className="hero py-5">
      <div className="background-image"></div> {/* Ajout d'un élément pour l'image de fond */}
      <Container>
        <Row>
          <Col md={6}>
            <h1>EcoRide</h1>
            <p>
              Covoiturage écologique et économique.
            </p>
            <Button variant="primary" href="/inscription">
              Inscrivez-vous gratuitement
            </Button>
          </Col>
          <Col md={6}>
            <SearchForm />
          </Col>
        </Row>
      </Container>
    </section>
  );
}

export default HeroSection;