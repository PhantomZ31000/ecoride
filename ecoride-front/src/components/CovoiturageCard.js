import React, { useState } from 'react';
import { Form, Button, Alert } from 'react-bootstrap';

function SearchForm() {
  const [depart, setDepart] = useState('');
  const [arrivee, setArrivee] = useState('');
  const [error, setError] = useState(null);
  const [isLoading, setIsLoading] = useState(false);

  const handleSubmit = async (event) => {
    event.preventDefault();
    setError(null); // Réinitialise l'erreur
    setIsLoading(true); // Démarre le chargement

    try {
      // Envoie la requête à l'API pour rechercher les covoiturages
      const response = await fetch(`http://127.0.0.1:8000/api/covoiturages?depart=${depart}&arrivee=${arrivee}`);
      
      if (response.ok) {
        // Traite la réponse en cas de succès
        const data = await response.json();
        console.log('Covoiturages:', data); // Traitement des données
      } else {
        const data = await response.json();
        setError(data.message || 'Une erreur est survenue lors de la recherche.');
      }
    } catch (error) {
      console.error('Erreur lors de la recherche:', error);
      setError('Une erreur est survenue lors de la recherche.');
    }

    setIsLoading(false); // Arrête le chargement
  };

  return (
    <Form onSubmit={handleSubmit}>
      {error && <Alert variant="danger">{error}</Alert>} {/* Affichage de l'erreur */}

      <Form.Group controlId="depart">
        <Form.Label>Ville de départ:</Form.Label>
        <Form.Control
          type="text"
          placeholder="Entrez la ville de départ"
          value={depart}
          onChange={(e) => setDepart(e.target.value)}
          required
        />
      </Form.Group>

      <Form.Group controlId="arrivee">
        <Form.Label>Ville d'arrivée:</Form.Label>
        <Form.Control
          type="text"
          placeholder="Entrez la ville d'arrivée"
          value={arrivee}
          onChange={(e) => setArrivee(e.target.value)}
          required
        />
      </Form.Group>

      <Button variant="primary" type="submit" disabled={isLoading}>
        {isLoading ? 'Recherche en cours...' : 'Rechercher'}
      </Button>
    </Form>
  );
}

export default SearchForm;
