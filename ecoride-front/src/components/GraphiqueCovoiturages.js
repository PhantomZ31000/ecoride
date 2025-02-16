import React, { useState, useEffect } from 'react';
import { LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, Legend } from 'recharts';
import './GraphiqueCovoiturages.css';

function GraphiqueCovoiturages() {
  const [data, setData] = useState();

  useEffect(() => {
    // Récupérer les données pour le graphique depuis l'API
    fetch('http://127.0.0.1:8000/api/stats/covoiturages-par-jour') // Remplacez par l'URL correcte de votre API
    .then(response => response.json())
    .then(data => setData(data));
  },);

  return (
    <LineChart width={600} height={300} data={data}>
      <XAxis dataKey="date" />
      <YAxis />
      <CartesianGrid stroke="#f5f5f5" />
      <Line type="monotone" dataKey="nombre" stroke="#8884d8" />
      <Tooltip />
      <Legend />
    </LineChart>
  );
}

export default GraphiqueCovoiturages;