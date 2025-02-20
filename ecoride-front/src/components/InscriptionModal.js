import React, { useState } from 'react';
import { Modal, Button, Form } from 'react-bootstrap';
import './InscriptionModal.css';

function InscriptionModal({ show, handleClose }) {
  const [pseudo, setPseudo] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');

  const handleSubmit = async (event) => {
    event.preventDefault();

    // Validation des mots de passe
    if (password !== confirmPassword) {
      alert('Les mots de passe ne correspondent pas.');
      return;
    }

    try {
      const response = await fetch('http://127.0.0.1:8000/api/users', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ pseudo, email, password }),
      });

      if (response.ok) {
        // Fermer la modale d'inscription
        handleClose();
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
    <Modal show={show} onHide={handleClose}>
      <Modal.Header closeButton>
        <Modal.Title>Inscription</Modal.Title>
      </Modal.Header>
      <Modal.Body>
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
          <Button variant="primary" type="submit">
            S'inscrire
          </Button>
        </Form>
      </Modal.Body>
    </Modal>
  );
}

export default InscriptionModal;
