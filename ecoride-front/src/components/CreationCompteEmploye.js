import React, { useState } from 'react';
import { Form, Button } from 'react-bootstrap';
import './CreationCompteEmploye.css';

function CreationCompteEmploye() {
  const [username, setUsername] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState(null);
  const [isLoading, setIsLoading] = useState(false);

  const handleSubmit = async (event) => {
    event.preventDefault();
    setError(null); // Réinitialise l'erreur
    setIsLoading(true); // Active le chargement

    try {
      const response = await fetch('http://127.0.0.1:8000/api/users', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ username, email, password, roles: ['ROLE_EMPLOYE'] }),
      });

      if (response.ok) {
        // Afficher un message de succès
        alert('Le compte employé a été créé avec succès.');
        // Réinitialiser le formulaire
        setUsername('');
        setEmail('');
        setPassword('');
      } else {
        // Afficher un message d'erreur
        const data = await response.json();
        setError(data.message || 'Une erreur est survenue');
      }
    } catch (error) {
      console.error('Erreur lors de la création du compte employé:', error);
      setError('Une erreur est survenue lors de la création du compte employé.');
    } finally {
      setIsLoading(false); // Désactive le chargement
    }
  };

  return (
    <Form onSubmit={handleSubmit}>
      {error && <div className="error-message">{error}</div>} {/* Affichage de l'erreur */}
      
      <Form.Group controlId="username">
        <Form.Label>Nom d'utilisateur:</Form.Label>
        <Form.Control
          type="text"
          placeholder="Entrez le nom d'utilisateur"
          value={username}
          onChange={(e) => setUsername(e.target.value)}
          required
        />
      </Form.Group>
      
      <Form.Group controlId="email">
        <Form.Label>Adresse email:</Form.Label>
        <Form.Control
          type="email"
          placeholder="Entrez l'adresse email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          required
        />
      </Form.Group>
      
      <Form.Group controlId="password">
        <Form.Label>Mot de passe:</Form.Label>
        <Form.Control
          type="password"
          placeholder="Entrez le mot de passe"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          required
        />
      </Form.Group>
      
      <Button variant="primary" type="submit" disabled={isLoading}>
        {isLoading ? 'Chargement...' : 'Créer le compte'}
      </Button>
    </Form>
  );
}

export default CreationCompteEmploye;
