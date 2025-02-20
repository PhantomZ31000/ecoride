import React, { useState, useEffect } from 'react';
import { Container, Row, Col, Image, Alert } from 'react-bootstrap';
import './UserProfile.css';

function UserProfile() {
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(true); // Nouveau state pour le chargement
  const [error, setError] = useState(null); // Nouveau state pour la gestion des erreurs

  useEffect(() => {
    // Récupérer les informations de l'utilisateur depuis l'API
    fetch('http://127.0.0.1:8000/api/users/1') // Remplacez 1 par l'ID de l'utilisateur connecté
      .then((response) => {
        if (!response.ok) {
          throw new Error('Impossible de récupérer les données de l\'utilisateur.');
        }
        return response.json();
      })
      .then((data) => {
        setUser(data);
        setLoading(false);
      })
      .catch((err) => {
        setError(err.message);
        setLoading(false);
      });
  }, []);

  if (loading) {
    return <div>Chargement...</div>;
  }

  if (error) {
    return <Alert variant="danger">Erreur: {error}</Alert>;
  }

  return (
    <Container>
      <Row className="mb-3">
        <Col md={3}>
          <Image src={user.photo || '/default-profile.png'} roundedCircle /> {/* Image par défaut si pas de photo */}
        </Col>
        <Col md={9}>
          <h2>{user.pseudo}</h2>
          <p>{user.email}</p>
        </Col>
      </Row>
      <Row>
        <Col>
          {user.nom && <p><strong>Nom:</strong> {user.nom}</p>}
          {user.prenom && <p><strong>Prénom:</strong> {user.prenom}</p>}
          {user.date_naissance && (
            <p>
              <strong>Date de naissance:</strong> {new Date(user.date_naissance).toLocaleDateString()}
            </p>
          )}
          {/* Ajouter d'autres informations à afficher selon les données disponibles */}
        </Col>
      </Row>
    </Container>
  );
}

export default UserProfile;
