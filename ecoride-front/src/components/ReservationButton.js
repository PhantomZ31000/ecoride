import React from 'react';
import { Button } from 'react-bootstrap';
import './ReservationButton.css';

function ReservationButton() {
  const handleClick = () => {
    // Logique pour réserver une place
    //...
  };

  return (
    <Button variant="primary" onClick={handleClick}>
      Réserver une place
    </Button>
  );
}

export default ReservationButton;