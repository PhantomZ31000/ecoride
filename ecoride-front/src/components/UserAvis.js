import React, { useState, useEffect } from 'react';
import './UserAvis.css';

function UserAvis() {
  const [avis, setAvis] = useState();

  useEffect(() => {
    // Récupérer les avis de l'utilisateur depuis l'API
    fetch('http://127.0.0.1:8000/api/avis?conducteur=1') // Remplacez 1 par l'ID de l'utilisateur connecté
    .then(response => response.json())
    .then(data => setAvis(data));
  },);

  return (
    <div>
      {/* Afficher la liste des avis */}
      {/*... */}
    </div>
  );
}

export default UserAvis;