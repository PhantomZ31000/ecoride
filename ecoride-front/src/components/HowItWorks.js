import React from 'react';
import { Container, Row, Col, Image } from 'react-bootstrap';
import './HowItWorks.css'; // Importez le fichier CSS

function HowItWorks() {
  return (
    <section className="how-it-works py-5">
      <Container>
        <h2>Comment ça marche ?</h2>
        <Row>
          <Col md={4}>
            <div className="step">
              <Image src="/images/etape1.png" alt="Étape 1" fluid />
              <h3>1. Trouvez votre trajet</h3>
              <p>
                Recherchez parmi des milliers de covoiturages celui qui
                correspond à votre itinéraire et à vos dates.
              </p>
            </div>
          </Col>
          <Col md={4}>
            <div className="step">
              <Image src="/images/etape2.png" alt="Étape 2" fluid />
              <h3>2. Réservez votre place</h3>
              <p>
                Une fois que vous avez trouvé le covoiturage idéal, réservez
                votre place en quelques clics.
              </p>
            </div>
          </Col>
          <Col md={4}>
            <div className="step">
              <Image src="/images/etape3.png" alt="Étape 3" fluid />
              <h3>3. Voyagez en toute sérénité</h3>
              <p>
                Rencontrez votre conducteur et profitez d'un trajet
                convivial et respectueux de l'environnement.
              </p>
            </div>
          </Col>
        </Row>
      </Container>
    </section>
  );
}

export default HowItWorks;
