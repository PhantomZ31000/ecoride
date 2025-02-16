import React, { useState, useEffect } from 'react';
import { Container, Row, Col, Image } from 'react-bootstrap';
import './CovoiturageDetails.css';

function CovoiturageDetails({ covoiturageId }) {
  const [covoiturage, setCovoiturage] = useState(null);

  useEffect(() => {
    // Récupérer les informations du covoiturage depuis l'API
    fetch(`http://127.0.0.1:8000/api/covoiturages/${covoiturageId}`)
    .then(response => response.json())
    .then(data => setCovoiturage(data));
  }, [covoiturageId]);

  if (!covoiturage) {
    return <div>Chargement...</div>;
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
          <p>{covoiturage.conducteur.pseudo}</p> {/* Assurez-vous que l'API renvoie les informations du conducteur */}
          {/* Afficher les autres informations du conducteur (photo, note, etc.) */}
          {/*... */}
        </Col>
        <Col md={4}>
          <h3>Voiture</h3>
          <p>{covoiturage.voiture.modele}</p> {/* Assurez-vous que l'API renvoie les informations de la voiture */}
          {/* Afficher les autres informations de la voiture (marque, couleur, etc.) */}
          {/*... */}
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