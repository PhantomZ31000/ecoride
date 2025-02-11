import React, { useRef, useEffect } from 'react';
import { Navbar, Nav, Container } from 'react-bootstrap';
import './NavigationBar.css';

function NavigationBar() {
  const navbarRef = useRef(null);

  useEffect(() => {
    // Initialize the reference after the component has mounted
    if (document.querySelector('.navbar')) {
      navbarRef.current = document.querySelector('.navbar');
    }
  }, []);

  return (
    <Navbar bg="light" expand="lg" ref={navbarRef}>
      <Container>
        <Navbar.Brand href="/">EcoRide</Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="me-auto">
            <Nav.Link href="/">Accueil</Nav.Link>
            <Nav.Link href="/recherche">Rechercher</Nav.Link>
            <Nav.Link href="/proposition">Proposer</Nav.Link>
          </Nav>
          <Nav>
            <Nav.Link href="/connexion">Connexion</Nav.Link>
            <Nav.Link href="/inscription">Inscription</Nav.Link>
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
}

export default NavigationBar;