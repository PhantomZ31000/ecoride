import React, { useState } from 'react';
import { Form, Button } from 'react-bootstrap';
import './InscriptionForm.css';

function InscriptionForm() {
  const [pseudo, setPseudo] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');

  const handleSubmit = async (event) => {
    event.preventDefault();

    if (password!== confirmPassword) {
      alert('Les mots de passe ne correspondent pas.');
      return;
    }

    try {
      const response = await fetch('/api/users', { // Assurez-vous que l'URL de l'API est correcte
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ pseudo, email, password }), // Assurez-vous que les champs correspondent à votre API
      });

      if (response.ok) {
        // Rediriger l'utilisateur vers la page de connexion après l'inscription
        window.location.href = '/connexion';
      } else {
        // Afficher un message d'erreur
        const data = await response.json();
        alert(data.message);
      }
    } catch (error) {
      console.error('Erreur lors de l\'inscription:', error);
      alert('Une erreur est survenue lors de l\'inscription.');
    }
  };

  return (
    <Form onSubmit={handleSubmit}>
      <Form.Group controlId="pseudo">
        <Form.Label>Pseudo:</Form.Label>
        <Form.Control
          type="text"
          placeholder="Entrez votre pseudo"
          value={pseudo}
          onChange={(e) => setPseudo(e.target.value)}
        />
      </Form.Group>
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
      <Form.Group controlId="confirmPassword">
        <Form.Label>Confirmer le mot de passe:</Form.Label>
        <Form.Control
          type="password"
          placeholder="Confirmez votre mot de passe"
          value={confirmPassword}
          onChange={(e) => setConfirmPassword(e.target.value)}
        />
      </Form.Group>
      <Button variant="primary" type="submit" className="mt-3">
        S'inscrire
      </Button>
    </Form>
  );
}

export default InscriptionForm;