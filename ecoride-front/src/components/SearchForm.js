import React, { useState } from 'react';
import { Form, Button } from 'react-bootstrap';
import './SearchForm.css';

function SearchForm() {
  const [depart, setDepart] = useState('');
  const [arrivee, setArrivee] = useState('');

  const handleSubmit = (event) => {
    event.preventDefault();
    // Envoyer la requête de recherche à l'API
    //...
  };

  return (
    <Form onSubmit={handleSubmit}>
      <Form.Group controlId="depart">
        <Form.Label>Ville de départ:</Form.Label>
        <Form.Control
          type="text"
          placeholder="Entrez la ville de départ"
          value={depart}
          onChange={(e) => setDepart(e.target.value)}
        />
      </Form.Group>
      <Form.Group controlId="arrivee">
        <Form.Label>Ville d'arrivée:</Form.Label>
        <Form.Control
          type="text"
          placeholder="Entrez la ville d'arrivée"
          value={arrivee}
          onChange={(e) => setArrivee(e.target.value)}
        />
      </Form.Group>
      <Button variant="primary" type="submit" className="mt-3">
        Rechercher
      </Button>
    </Form>
  );
}

export default SearchForm;