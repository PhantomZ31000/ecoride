import React, { useState, useEffect } from 'react';
import './CovoituragesProblemes.css';

function CovoituragesProblemes() {
  const [covoiturages, setCovoiturages] = useState();

  useEffect(() => {
    // Récupérer les covoiturages problématiques depuis l'API
    fetch('/api/covoiturages?probleme=true') // Remplacez par l'URL correcte de votre API
    .then(response => response.json())
    .then(data => setCovoiturages(data));
  },);

  return (
    <div>
      <h2>Covoiturages problématiques</h2>
      {covoiturages.map((covoiturage) => (
        <div key={covoiturage.id}>
          <h3>Covoiturage #{covoiturage.id}</h3>
          <p>Passager: {covoiturage.passager.pseudo}</p>
          <p>Conducteur: {covoiturage.conducteur.pseudo}</p>
          <p>Date et heure de départ: {covoiturage.date_depart} à {covoiturage.heure_depart}</p>
          <p>Lieu de départ: {covoiturage.lieu_depart}</p>
          <p>Lieu d'arrivée: {covoiturage.lieu_arrivee}</p>
          {covoiturage.commentaire && <p>Commentaire du passager: {covoiturage.commentaire}</p>}
        </div>
      ))}
    </div>
  );
}

export default CovoituragesProblemes;