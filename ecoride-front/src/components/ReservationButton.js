import React, { useState } from 'react';
import { Button } from 'react-bootstrap';
import './ReservationButton.css';

function ReservationButton() {
  const [isReserved, setIsReserved] = useState(false); // Gérer l'état de réservation

  const handleClick = async () => {
    try {
      // Logique pour réserver une place via une API ou autre action
      const response = await fetch('http://127.0.0.1:8000/api/reservation', { // Remplace l'URL par celle de ton API
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ /* Paramètres nécessaires pour la réservation */ }),
      });

      if (response.ok) {
        setIsReserved(true); // Mettre à jour l'état après la réservation
      } else {
        // Gérer l'erreur
        alert('Erreur lors de la réservation');
      }
    } catch (error) {
      console.error('Erreur lors de la réservation:', error);
      alert('Une erreur est survenue lors de la réservation.');
    }
  };

  return (
    <Button variant="primary" onClick={handleClick} disabled={isReserved}>
      {isReserved ? 'Place réservée' : 'Réserver une place'}
    </Button>
  );
}

export default ReservationButton;
