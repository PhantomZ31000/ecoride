import React, { useState } from 'react';
import { Modal, Button, Form, Alert } from 'react-bootstrap';
import './ConnexionModal.css';

function ConnexionModal({ show, handleClose }) {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState(null);
  const [isLoading, setIsLoading] = useState(false);  // Ajout de l'état pour le chargement

  const handleSubmit = async (event) => {
    event.preventDefault();
    setError(null);  // Réinitialise les erreurs
    setIsLoading(true);  // Démarre le chargement

    try {
      const response = await fetch('http://127.0.0.1:8000/api/login', {
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
        const data = await response.json();
        setError(data.message || 'Erreur lors de la connexion.');
      }
    } catch (error) {
      console.error('Erreur lors de la connexion:', error);
      setError('Une erreur est survenue lors de la connexion.');
    }

    setIsLoading(false);  // Arrête le chargement
  };

  return (
    <Modal show={show} onHide={handleClose}>
      <Modal.Header closeButton>
        <Modal.Title>Connexion</Modal.Title>
      </Modal.Header>
      <Modal.Body>
        <Form onSubmit={handleSubmit}>
          {error && <Alert variant="danger">{error}</Alert>}  {/* Affichage de l'erreur */}

          <Form.Group controlId="email">
            <Form.Label>Adresse email:</Form.Label>
            <Form.Control
              type="email"
              placeholder="Entrez votre adresse email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              required
            />
          </Form.Group>

          <Form.Group controlId="password">
            <Form.Label>Mot de passe:</Form.Label>
            <Form.Control
              type="password"
              placeholder="Entrez votre mot de passe"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              required
            />
          </Form.Group>

          <Button variant="primary" type="submit" disabled={isLoading} className="mt-3">
            {isLoading ? 'Chargement...' : 'Connexion'}
          </Button>
        </Form>
      </Modal.Body>
    </Modal>
  );
}

export default ConnexionModal;
