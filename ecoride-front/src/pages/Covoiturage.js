import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { Container } from 'react-bootstrap';
import CovoiturageDetails from '../components/CovoiturageDetails';
import AvisList from '../components/AvisList';
import ReservationButton from '../components/ReservationButton';

function Covoiturage() {
  const { covoiturageId } = useParams();
  const [covoiturage, setCovoiturage] = useState(null);

  useEffect(() => {
    // Récupérer les informations du covoiturage depuis l'API
    fetch(`/api/covoiturages/${covoiturageId}`)
    .then(response => response.json())
    .then(data => setCovoiturage(data));
  }, [covoiturageId]);

  if (!covoiturage) {
    return <div>Chargement...</div>;
  }

  return (
    <Container>
      <h1>Covoiturage</h1>
      <CovoiturageDetails covoiturage={covoiturage} />
      <AvisList avis={covoiturage.avis} />
      <ReservationButton />
    </Container>
  );
}

export default Covoiturage;