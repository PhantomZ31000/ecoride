import React, { useState, useEffect } from 'react';
import './TotalCredits.css';

function TotalCredits() {
  const [totalCredits, setTotalCredits] = useState(0);

  useEffect(() => {
    // Récupérer le nombre total de crédits depuis l'API
    fetch('http://127.0.0.1:8000/api/stats/total-credits') // Remplacez par l'URL correcte de votre API
    .then(response => response.json())
    .then(data => setTotalCredits(data.total));
  },);

  return (
    <div>
      <h3>Total des crédits gagnés: {totalCredits}</h3>
    </div>
  );
}

export default TotalCredits;