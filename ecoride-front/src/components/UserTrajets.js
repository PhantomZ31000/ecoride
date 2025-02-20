import React, { useState, useEffect } from 'react';
import { Tabs, Tab, ListGroup, Spinner, Alert } from 'react-bootstrap';

function UserTrajets() {
  const [trajetsProposes, setTrajetsProposes] = useState([]);
  const [trajetsReserves, setTrajetsReserves] = useState([]);
  const [loadingProposes, setLoadingProposes] = useState(true);
  const [loadingReserves, setLoadingReserves] = useState(true);
  const [errorProposes, setErrorProposes] = useState(null);
  const [errorReserves, setErrorReserves] = useState(null);

  useEffect(() => {
    // Récupérer les trajets proposés par l'utilisateur depuis l'API
    fetch('http://127.0.0.1:8000/api/covoiturages?conducteur=1') // Remplacez 1 par l'ID de l'utilisateur connecté
      .then(response => response.json())
      .then(data => {
        setTrajetsProposes(data);
        setLoadingProposes(false);
      })
      .catch(error => {
        setErrorProposes('Erreur lors de la récupération des trajets proposés.');
        setLoadingProposes(false);
      });

    // Récupérer les trajets réservés par l'utilisateur depuis l'API
    fetch('http://127.0.0.1:8000/api/covoiturages?passager=1') // Remplacez 1 par l'ID de l'utilisateur connecté
      .then(response => response.json())
      .then(data => {
        setTrajetsReserves(data);
        setLoadingReserves(false);
      })
      .catch(error => {
        setErrorReserves('Erreur lors de la récupération des trajets réservés.');
        setLoadingReserves(false);
      });
  }, []);

  const renderTrajets = (trajets, loading, error) => {
    if (loading) {
      return <Spinner animation="border" />;
    }

    if (error) {
      return <Alert variant="danger">{error}</Alert>;
    }

    if (trajets.length === 0) {
      return <p>Aucun trajet trouvé.</p>;
    }

    return (
      <ListGroup>
        {trajets.map((trajet) => (
          <ListGroup.Item key={trajet.id}>
            {trajet.lieu_depart} - {trajet.lieu_arrivee} <br />
            {trajet.date_depart} à {trajet.heure_depart} <br />
            {trajet.prix} €
          </ListGroup.Item>
        ))}
      </ListGroup>
    );
  };

  return (
    <Tabs defaultActiveKey="proposes" id="user-trajets-tabs">
      <Tab eventKey="proposes" title="Trajets proposés">
        {renderTrajets(trajetsProposes, loadingProposes, errorProposes)}
      </Tab>
      <Tab eventKey="reserves" title="Trajets réservés">
        {renderTrajets(trajetsReserves, loadingReserves, errorReserves)}
      </Tab>
    </Tabs>
  );
}

export default UserTrajets;
