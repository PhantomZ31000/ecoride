import React, { useState, useEffect } from 'react';
import { BarChart, Bar, XAxis, YAxis, CartesianGrid, Tooltip, Legend } from 'recharts';
import './GraphiqueCredits.css';


function GraphiqueCredits() {
  const [data, setData] = useState();

  useEffect(() => {
    // Récupérer les données pour le graphique depuis l'API
    fetch('/api/stats/credits-par-jour') // Remplacez par l'URL correcte de votre API
    .then(response => response.json())
    .then(data => setData(data));
  },);

  return (
    <BarChart width={600} height={300} data={data}>
      <XAxis dataKey="date" />
      <YAxis />
      <CartesianGrid stroke="#f5f5f5" />
      <Bar dataKey="credits" fill="#82ca9d" />
      <Tooltip />
      <Legend />
    </BarChart>
  );
}

export default GraphiqueCredits;