import React, { useState, useEffect } from 'react';
import { Container, Row, Col, Image } from 'react-bootstrap';
import './UserProfile.css';

function UserProfile() {
  const [user, setUser] = useState(null);

  useEffect(() => {
    // Récupérer les informations de l'utilisateur depuis l'API
    fetch('http://127.0.0.1:8000/api/users/1') // Remplacez 1 par l'ID de l'utilisateur connecté
    .then(response => response.json())
    .then(data => setUser(data));
  },);

  if (!user) {
    return <div>Chargement...</div>;
  }

  return (
    <Container>
      <Row className="mb-3">
        <Col md={3}>
          <Image src={user.photo} roundedCircle /> {/* Assurez-vous que l'API renvoie l'URL de la photo */}
        </Col>
        <Col md={9}>
          <h2>{user.pseudo}</h2>
          <p>{user.email}</p>
        </Col>
      </Row>
      <Row>
        <Col>
          {/* Afficher les autres informations du profil (nom, prénom, date de naissance, etc.) */}
          {/*... */}
        </Col>
      </Row>
    </Container>
  );
}

export default UserProfile;