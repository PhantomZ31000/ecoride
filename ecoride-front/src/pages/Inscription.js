import React, { useState } from 'react';
import { Container, Button, Form, Spinner } from 'react-bootstrap';
import InscriptionForm from '../components/InscriptionForm';

function Inscription() {
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [error, setError] = useState(null);

  const handleSubmit = async (formData) => {
    setIsSubmitting(true);
    setError(null); // Réinitialiser l'erreur avant chaque soumission

    try {
      // Logique de soumission du formulaire via une API ou autre
      // Exemple d'appel API
      const response = await fetch('API_URL', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
      });

      if (!response.ok) {
        throw new Error('Une erreur est survenue lors de l\'inscription.');
      }

      // Si tout va bien, réinitialisez ou redirigez vers une autre page
      // Ex : navigate('/dashboard');
    } catch (err) {
      setError(err.message);
    } finally {
      setIsSubmitting(false);
    }
  };

  return (
    <Container>
      <h1>Inscription</h1>
      {error && <div className="alert alert-danger">{error}</div>} {/* Affichage des erreurs */}
      <InscriptionForm onSubmit={handleSubmit} />
      {isSubmitting && (
        <div className="text-center mt-4">
          <Spinner animation="border" />
        </div>
      )}
    </Container>
  );
}

export default Inscription;
