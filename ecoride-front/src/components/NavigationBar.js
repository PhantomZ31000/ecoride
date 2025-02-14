import React from 'react';
import { Navbar, Nav, Container } from 'react-bootstrap';
import './NavigationBar.css';


function NavigationBar() {
  return (
    <Navbar expand="lg" className="custom-navbar">
      <Container>
      <Navbar.Brand href="/" className="navbar-brand">
        <img src="/images/logo_transparent.png" alt="Logo EcoRide" className="logo-image" />
      </Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="ms-auto">
            <Nav.Link href="/">Accueil</Nav.Link>
            <Nav.Link href="/recherche">Rechercher</Nav.Link>
            <Nav.Link href="/proposition">Proposer</Nav.Link>
          </Nav>
          <Nav> {/* Aligner à droite avec ms-auto */}
          <Nav.Link href="/connexion" className="btn btn-connexion btn-primary">
            Connexion
          </Nav.Link>
          <Nav.Link href="/inscription" className="btn btn-inscription btn-primary">
            Inscription
          </Nav.Link>
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
}

export default NavigationBar;