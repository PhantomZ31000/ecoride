import React from 'react';
import { Modal, Button, Spinner } from 'react-bootstrap';
import './ConfirmationModal.css';

function ConfirmationModal({ show, handleClose, message, onConfirm, isLoading }) {
  return (
    <Modal show={show} onHide={handleClose}>
      <Modal.Header closeButton>
        <Modal.Title>Confirmation</Modal.Title>
      </Modal.Header>
      <Modal.Body>{message}</Modal.Body>
      <Modal.Footer>
        <Button variant="secondary" onClick={handleClose}>
          Annuler
        </Button>
        <Button
          variant="primary"
          onClick={onConfirm}
          disabled={isLoading} // Désactive le bouton lors du chargement
        >
          {isLoading ? (
            <Spinner animation="border" size="sm" role="status" aria-hidden="true" />
          ) : (
            'Confirmer'
          )}
        </Button>
      </Modal.Footer>
    </Modal>
  );
}

export default ConfirmationModal;
