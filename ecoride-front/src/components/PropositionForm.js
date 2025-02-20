import React, { useState, useEffect } from 'react';
import { Form, Button } from 'react-bootstrap';
import './PropositionForm.css';

function PropositionForm() {
  const [lieuDepart, setLieuDepart] = useState('');
  const [lieuArrivee, setLieuArrivee] = useState('');
  const [dateDepart, setDateDepart] = useState('');
  const [heureDepart, setHeureDepart] = useState('');
  const [prix, setPrix] = useState('');
  const [nombrePlacesDisponibles, setNombrePlacesDisponibles] = useState('');
  const [conducteur, setConducteur] = useState(null);
  const [voitures, setVoitures] = useState([]);
  const [voitureId, setVoitureId] = useState('');

  useEffect(() => {
    const userId = 1; // Remplacez avec l'ID dynamique de l'utilisateur connecté si nécessaire

    // Récupérer l'utilisateur connecté
    fetch(`http://127.0.0.1:8000/api/users/${userId}`)
      .then((response) => response.json())
      .then((data) => setConducteur(data))
      .catch((error) => console.error('Erreur lors de la récupération de l\'utilisateur:', error));

    // Récupérer les voitures de l'utilisateur
    fetch('http://127.0.0.1:8000/api/voitures') // Vérifiez que cette URL est correcte
      .then((response) => response.json())
      .then((data) => setVoitures(data))
      .catch((error) => console.error('Erreur lors de la récupération des voitures:', error));
  }, []);

  const handleSubmit = async (event) => {
    event.preventDefault();

    try {
      const response = await fetch('http://127.0.0.1:8000/api/covoiturages', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          lieuDepart,
          lieuArrivee,
          dateDepart,
          heureDepart,
          prix,
          nombrePlacesDisponibles,
          conducteur: `/api/users/1`, // Remplacez 1 par l'ID de l'utilisateur connecté
          voiture: `/api/voitures/${voitureId}`,
        }),
      });

      if (response.ok) {
        window.location.href = '/profil'; // Rediriger vers le profil après soumission
      } else {
        const data = await response.json();
        alert(data.message); // Afficher le message d'erreur
      }
    } catch (error) {
      console.error('Erreur lors de la proposition:', error);
      alert('Une erreur est survenue lors de la proposition.');
    }
  };

  if (!conducteur || voitures.length === 0) {
    return <div>Chargement...</div>;
  }

  return (
    <Form onSubmit={handleSubmit}>
      <Form.Group controlId="lieuDepart">
        <Form.Label>Lieu de départ:</Form.Label>
        <Form.Control
          type="text"
          placeholder="Entrez le lieu de départ"
          value={lieuDepart}
          onChange={(e) => setLieuDepart(e.target.value)}
        />
      </Form.Group>

      <Form.Group controlId="lieuArrivee">
        <Form.Label>Lieu d'arrivée:</Form.Label>
        <Form.Control
          type="text"
          placeholder="Entrez le lieu d'arrivée"
          value={lieuArrivee}
          onChange={(e) => setLieuArrivee(e.target.value)}
        />
      </Form.Group>

      <Form.Group controlId="dateDepart">
        <Form.Label>Date de départ:</Form.Label>
        <Form.Control
          type="date"
          value={dateDepart}
          onChange={(e) => setDateDepart(e.target.value)}
        />
      </Form.Group>

      <Form.Group controlId="heureDepart">
        <Form.Label>Heure de départ:</Form.Label>
        <Form.Control
          type="time"
          value={heureDepart}
          onChange={(e) => setHeureDepart(e.target.value)}
        />
      </Form.Group>

      <Form.Group controlId="prix">
        <Form.Label>Prix:</Form.Label>
        <Form.Control
          type="number"
          placeholder="Entrez le prix"
          value={prix}
          onChange={(e) => setPrix(e.target.value)}
        />
      </Form.Group>

      <Form.Group controlId="nombrePlacesDisponibles">
        <Form.Label>Nombre de places disponibles:</Form.Label>
        <Form.Control
          type="number"
          placeholder="Entrez le nombre de places disponibles"
          value={nombrePlacesDisponibles}
          onChange={(e) => setNombrePlacesDisponibles(e.target.value)}
        />
      </Form.Group>

      <Form.Group controlId="voiture">
        <Form.Label>Voiture:</Form.Label>
        <Form.Control
          as="select"
          value={voitureId}
          onChange={(e) => setVoitureId(e.target.value)}
        >
          <option value="">Sélectionnez une voiture</option>
          {voitures.map((voiture) => (
            <option key={voiture.id} value={voiture.id}>
              {voiture.modele} ({voiture.immatriculation})
            </option>
          ))}
        </Form.Control>
      </Form.Group>

      <Button variant="primary" type="submit">
        Proposer
      </Button>
    </Form>
  );
}

export default PropositionForm;
