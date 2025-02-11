import React, { useState } from 'react';
import { Form, Button } from 'react-bootstrap';
import './ConnexionForm.css';

function ConnexionForm() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleSubmit = async (event) => {
    event.preventDefault();

    try {
      const response = await fetch('/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email, password }),
      });

      if (response.ok) {
        // Rediriger l'utilisateur vers la page d'accueil après la connexion
        window.location.href = '/';
      } else {
        // Afficher un message d'erreur
        const data = await response.json();
        alert(data.message);
      }
    } catch (error) {
      console.error('Erreur lors de la connexion:', error);
      alert('Une erreur est survenue lors de la connexion.');
    }
  };

  return (
    <Form onSubmit={handleSubmit}>
      <Form.Group controlId="email">
        <Form.Label>Adresse email:</Form.Label>
        <Form.Control
          type="email"
          placeholder="Entrez votre adresse email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
        />
      </Form.Group>
      <Form.Group controlId="password">
        <Form.Label>Mot de passe:</Form.Label>
        <Form.Control
          type="password"
          placeholder="Entrez votre mot de passe"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
        />
      </Form.Group>
      <Button variant="primary" type="submit" className="mt-3">
        Connexion
      </Button>
    </Form>
  );
}

export default ConnexionForm;