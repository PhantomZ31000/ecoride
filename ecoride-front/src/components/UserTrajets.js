import React, { useState, useEffect } from 'react';
import { Tabs, Tab } from 'react-bootstrap';

function UserTrajets() {
  const [trajetsProposes, setTrajetsProposes] = useState();
  const [trajetsReserves, setTrajetsReserves] = useState();

  useEffect(() => {
    // Récupérer les trajets proposés par l'utilisateur depuis l'API
    fetch('http://127.0.0.1:8000/api/covoiturages?conducteur=1') // Remplacez 1 par l'ID de l'utilisateur connecté
    .then(response => response.json())
    .then(data => setTrajetsProposes(data));

    // Récupérer les trajets réservés par l'utilisateur depuis l'API
    //...
  },);

  return (
    <Tabs defaultActiveKey="proposes" id="user-trajets-tabs">
      <Tab eventKey="proposes" title="Trajets proposés">
        {/* Afficher la liste des trajets proposés */}
        {/*... */}
      </Tab>
      <Tab eventKey="reserves" title="Trajets réservés">
        {/* Afficher la liste des trajets réservés */}
        {/*... */}
      </Tab>
    </Tabs>
  );
}

export default UserTrajets;