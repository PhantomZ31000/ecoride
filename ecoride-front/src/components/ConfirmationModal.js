import React from 'react';
import { Modal, Button } from 'react-bootstrap';
import './ConfirmationModal.css';

function ConfirmationModal({ show, handleClose, message, onConfirm }) {
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
        <Button variant="primary" onClick={onConfirm}>
          Confirmer
        </Button>
      </Modal.Footer>
    </Modal>
  );
}

export default ConfirmationModal;