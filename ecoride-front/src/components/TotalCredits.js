import React, { useState, useEffect } from 'react';
import './TotalCredits.css';

function TotalCredits() {
  const [totalCredits, setTotalCredits] = useState(0);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    // Récupérer le nombre total de crédits depuis l'API
    fetch('http://127.0.0.1:8000/api/stats/total-credits') 
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la récupération des crédits');
        }
        return response.json();
      })
      .then(data => {
        setTotalCredits(data.total);
        setLoading(false); // Fin du chargement
      })
      .catch(error => {
        setError(error.message);
        setLoading(false); // Fin du chargement en cas d'erreur
      });
  }, []);

  if (loading) {
    return <div>Chargement...</div>; // Affichage du message pendant le chargement
  }

  if (error) {
    return <div>Erreur: {error}</div>; // Affichage de l'erreur
  }

  return (
    <div>
      <h3>Total des crédits gagnés: {totalCredits}</h3>
    </div>
  );
}

export default TotalCredits;
