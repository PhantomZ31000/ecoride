import React, { useState, useEffect } from 'react';
import './AvisValidation.css';

function AvisValidation() {
  const [avis, setAvis] = useState([]);

  useEffect(() => {
    // Récupérer les avis en attente de validation depuis l'API
    fetch('http://127.0.0.1:8000/api/avis?validation=false') // Remplacez par l'URL correcte de votre API
    .then(response => response.json())
    .then(data => setAvis(data))
    .catch(error => {
      console.error('Erreur lors de la récupération des avis:', error);
      alert('Une erreur est survenue lors de la récupération des avis.');
    });
  }, []); // Ajouter [] pour exécuter seulement lors du montage du composant

  const handleValidation = async (avisId, validation) => {
    try {
      const response = await fetch(`/api/avis/${avisId}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ validation }),
      });

      if (response.ok) {
        // Mettre à jour la liste des avis
        setAvis((prevAvis) => prevAvis.filter((avi) => avi.id !== avisId));
      } else {
        // Afficher un message d'erreur
        const data = await response.json();
        alert(data.message);
      }
    } catch (error) {
      console.error('Erreur lors de la validation de l\'avis:', error);
      alert('Une erreur est survenue lors de la validation de l\'avis.');
    }
  };

  if (!avis || avis.length === 0) {
    return <div>Aucun avis en attente de validation.</div>;
  }

  return (
    <div>
      <h2>Avis en attente de validation</h2>
      {avis.map((avi) => (
        <div key={avi.id} className="avis-item">
          <h3>{avi.passager.pseudo} à propos de {avi.conducteur.pseudo}</h3>
          <p>Note: {avi.note}</p>
          <p>Commentaire: {avi.commentaire}</p>
          <button onClick={() => handleValidation(avi.id, true)}>Valider</button>
          <button onClick={() => handleValidation(avi.id, false)}>Refuser</button>
        </div>
      ))}
    </div>
  );
}

export default AvisValidation;
