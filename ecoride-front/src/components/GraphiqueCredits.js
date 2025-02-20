import React, { useState, useEffect } from 'react';
import { BarChart, Bar, XAxis, YAxis, CartesianGrid, Tooltip, Legend } from 'recharts';
import './GraphiqueCredits.css';

function GraphiqueCredits() {
  const [data, setData] = useState([]);

  useEffect(() => {
    // Récupérer les données pour le graphique depuis l'API
    fetch('http://127.0.0.1:8000/api/stats/credits-par-jour') // Remplacez par l'URL correcte de votre API
      .then(response => response.json())
      .then(data => {
        // Vérifiez si les données sont dans un format valide avant de les mettre à jour
        if (Array.isArray(data)) {
          setData(data);
        } else {
          console.error('Données invalides reçues:', data);
        }
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des données du graphique:', error);
      });
  }, []);

  return (
    <div className="graphique-credits">
      {data.length > 0 ? (
        <BarChart width={600} height={300} data={data}>
          <XAxis dataKey="date" />
          <YAxis />
          <CartesianGrid stroke="#f5f5f5" />
          <Bar dataKey="credits" fill="#82ca9d" />
          <Tooltip />
          <Legend />
        </BarChart>
      ) : (
        <p>Chargement des données...</p>
      )}
    </div>
  );
}

export default GraphiqueCredits;
