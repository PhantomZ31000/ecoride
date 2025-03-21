import React, { useState, useEffect } from 'react';
import { LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, Legend } from 'recharts';
import './GraphiqueCovoiturages.css';

function GraphiqueCovoiturages() {
  const [data, setData] = useState([]);

  useEffect(() => {
    // Récupérer les données pour le graphique depuis l'API
    fetch('http://127.0.0.1:8000/api/stats/covoiturages-par-jour') 
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
    <div className="graphique-covoiturages">
      {data.length > 0 ? (
        <LineChart width={600} height={300} data={data}>
          <XAxis dataKey="date" />
          <YAxis />
          <CartesianGrid stroke="#f5f5f5" />
          <Line type="monotone" dataKey="nombre" stroke="#8884d8" />
          <Tooltip />
          <Legend />
        </LineChart>
      ) : (
        <p>Chargement des données...</p>
      )}
    </div>
  );
}

export default GraphiqueCovoiturages;
