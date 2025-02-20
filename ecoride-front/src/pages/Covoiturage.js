import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { Container, Spinner } from 'react-bootstrap';  // Ajout du Spinner
import CovoiturageDetails from '../components/CovoiturageDetails';
import AvisList from '../components/AvisList';
import ReservationButton from '../components/ReservationButton';

function Covoiturage() {
  const { covoiturageId } = useParams();
  const [covoiturage, setCovoiturage] = useState(null);
  const [loading, setLoading] = useState(true);  // État pour le chargement
  const [error, setError] = useState(null);  // État pour gérer les erreurs

  useEffect(() => {
    fetch(`http://127.0.0.1:8000/api/covoiturages/${covoiturageId}`)
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la récupération des données');
        }
        return response.json();
      })
      .then(data => {
        setCovoiturage(data);
        setLoading(false);
      })
      .catch(error => {
        console.error("Error fetching covoiturage:", error);
        setError(error.message);
        setLoading(false);
      });
  }, [covoiturageId]);

  if (loading) {
    return (
      <div className="text-center">
        <Spinner animation="border" variant="primary" />
        <p>Chargement des données...</p>
      </div>
    );
  }

  if (error) {
    return <div>Erreur: {error}</div>;
  }

  return (
    <Container>
      <h1>Détails du Covoiturage</h1>
      <CovoiturageDetails covoiturage={covoiturage} />
      <AvisList avis={covoiturage.avis} />
      <ReservationButton />
    </Container>
  );
}

export default Covoiturage;
