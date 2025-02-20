import React from 'react';
import { Container, Row, Col } from 'react-bootstrap';
import './Temoignages.css'; // Fichier CSS

function Temoignages() {
  return (
    <section className="temoignages py-5">
      <Container>
        <h2>Témoignages</h2>
        <Row>
          <Col md={4}>
            <div className="temoignage">
              <p>
                "J'ai adoré utiliser EcoRide! J'ai fait des économies et j'ai
                rencontré des gens sympas."
              </p>
              <p className="auteur">- Julie</p>
            </div>
          </Col>
          <Col md={4}>
            <div className="temoignage">
              <p>
                "EcoRide est une excellente alternative aux transports en
                commun. Je recommande!"
              </p>
              <p className="auteur">- Thomas</p>
            </div>
          </Col>
          <Col md={4}>
            <div className="temoignage">
              <p>
                "Grâce à EcoRide, j'ai pu me déplacer facilement et à moindre
                coût. Merci!"
              </p>
              <p className="auteur">- Léa</p>
            </div>
          </Col>
        </Row>
      </Container>
    </section>
  );
}

export default Temoignages;
