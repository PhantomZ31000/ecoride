import React from 'react';
import { Container, Row, Col } from 'react-bootstrap';
import './Footer.css';

function Footer() {
  return (
    <footer className="bg-light py-5">
      <Container>
        <Row>
          <Col md={6}>
            <h5>EcoRide</h5>
            <p>
              Covoiturage écologique et économique.
            </p>
          </Col>
          <Col md={6}>
            <h5>Liens utiles</h5>
            <ul className="list-unstyled">
              <li>
                <a href="/mentions-legales">Mentions légales</a>
              </li>
              <li>
                <a href="/contact">Contact</a>
              </li>
            </ul>
          </Col>
        </Row>
      </Container>
    </footer>
  );
}

export default Footer;