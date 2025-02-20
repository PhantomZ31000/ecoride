import React, { useState, useEffect } from 'react';
import { Container, Row, Col, Image, Alert } from 'react-bootstrap';
import './CovoiturageDetails.css';

function CovoiturageDetails({ covoiturageId }) {
  const [covoiturage, setCovoiturage] = useState(null);
  const [error, setError] = useState(null);
  const [isLoading, setIsLoading] = useState(true);

  useEffect(() => {
    const fetchCovoiturage = async () => {
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/covoiturages/${covoiturageId}`);
        
        if (!response.ok) {
          throw new Error('Impossible de récupérer les données du covoiturage');
        }

        const data = await response.json();
        setCovoiturage(data);
      } catch (err) {
        setError(err.message);
      } finally {
        setIsLoading(false);
      }
    };

    fetchCovoiturage();
  }, [covoiturageId]);

  if (isLoading) {
    return <div>Chargement...</div>;
  }

  if (error) {
    return <Alert variant="danger">{error}</Alert>;
  }

  return (
    <Container>
      <Row className="mb-3">
        <Col>
          <h2>
            {covoiturage.lieu_depart} - {covoiturage.lieu_arrivee}
          </h2>
          <p>
            Date: {covoiturage.date_depart} - Heure: {covoiturage.heure_depart}
          </p>
          <p>Prix: {covoiturage.prix} €</p>
        </Col>
      </Row>
      <Row>
        <Col md={4}>
          <h3>Conducteur</h3>
          <p>{covoiturage.conducteur.pseudo}</p> 
          {/*... */}
        </Col>
        <Col md={4}>
          <h3>Voiture</h3>
          <p>{covoiturage.voiture.modele}</p> 
        </Col>
        <Col md={4}>
          <h3>Détails du trajet</h3>
          {/* Afficher les détails du trajet (itinéraire, étapes, etc.) */}
          {/*... */}
        </Col>
      </Row>
    </Container>
  );
}

export default CovoiturageDetails;
