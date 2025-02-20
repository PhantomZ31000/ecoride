import React, { useState, useEffect } from 'react';
import './UserAvis.css';

function UserAvis() {
  const [avis, setAvis] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    // Récupérer les avis de l'utilisateur depuis l'API
    fetch('http://127.0.0.1:8000/api/avis?conducteur=1') // Remplacez 1 par l'ID de l'utilisateur connecté
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la récupération des avis');
        }
        return response.json();
      })
      .then(data => {
        setAvis(data);
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
      <h3>Mes Avis</h3>
      {avis.length > 0 ? (
        <div>
          {avis.map((avi) => (
            <div key={avi.id} className="avis-item">
              <p><strong>{avi.passager.pseudo}</strong> à propos de <strong>{avi.conducteur.pseudo}</strong></p>
              <p>Note: {avi.note} / 5</p>
              <p>Commentaire: {avi.commentaire}</p>
            </div>
          ))}
        </div>
      ) : (
        <p>Aucun avis disponible.</p>
      )}
    </div>
  );
}

export default UserAvis;
