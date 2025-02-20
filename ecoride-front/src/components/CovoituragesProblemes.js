import React, { useState, useEffect } from 'react';
import './CovoituragesProblemes.css';

function CovoituragesProblemes() {
  const [covoiturages, setCovoiturages] = useState([]);
  const [error, setError] = useState(null);
  const [isLoading, setIsLoading] = useState(true);

  useEffect(() => {
    const fetchCovoiturages = async () => {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/covoiturages?probleme=true'); // Remplacez par l'URL correcte de votre API
        if (!response.ok) {
          throw new Error('Impossible de récupérer les covoiturages problématiques');
        }
        const data = await response.json();
        setCovoiturages(data);
      } catch (err) {
        setError(err.message);
      } finally {
        setIsLoading(false);
      }
    };

    fetchCovoiturages();
  }, []);

  if (isLoading) {
    return <div>Chargement...</div>;
  }

  if (error) {
    return <div className="error">{error}</div>;
  }

  return (
    <div>
      <h2>Covoiturages problématiques</h2>
      {covoiturages.length === 0 ? (
        <p>Aucun covoiturage problématique trouvé.</p>
      ) : (
        covoiturages.map((covoiturage) => (
          <div key={covoiturage.id}>
            <h3>Covoiturage #{covoiturage.id}</h3>
            <p>Passager: {covoiturage.passager.pseudo}</p>
            <p>Conducteur: {covoiturage.conducteur.pseudo}</p>
            <p>Date et heure de départ: {covoiturage.date_depart} à {covoiturage.heure_depart}</p>
            <p>Lieu de départ: {covoiturage.lieu_depart}</p>
            <p>Lieu d'arrivée: {covoiturage.lieu_arrivee}</p>
            {covoiturage.commentaire && <p>Commentaire du passager: {covoiturage.commentaire}</p>}
          </div>
        ))
      )}
    </div>
  );
}

export default CovoituragesProblemes;
