import React from 'react';
import { Container, Row, Col, Image } from 'react-bootstrap';
import './Avantages.css'; // Importez le fichier CSS

function Avantages() {
  return (
    <section className="avantages py-5">
      <Container>
        <h2>Les avantages d'EcoRide</h2>
        <Row>
          <Col md={4}>
            <div className="avantage">
              <Image src="/images/saves.jpg" alt="Économique" fluid />
              <h3>Économique</h3>
              <p>
                Économisez sur vos frais de déplacement en partageant les
                coûts avec d'autres passagers.
              </p>
            </div>
          </Col>
          <Col md={4}>
            <div className="avantage">
              <Image src="/images/carbon.jpg" alt="Écologique" fluid />
              <h3>Écologique</h3>
              <p>
                Réduisez votre empreinte carbone en optant pour le
                covoiturage.
              </p>
            </div>
          </Col>
          <Col md={4}>
            <div className="avantage">
              <Image src="/images/friendly.jpg" alt="Convivial" fluid />
              <h3>Convivial</h3>
              <p>
                Rencontrez de nouvelles personnes et partagez des moments
                agréables lors de vos trajets.
              </p>
            </div>
          </Col>
        </Row>
      </Container>
    </section>
  );
}

export default Avantages;
