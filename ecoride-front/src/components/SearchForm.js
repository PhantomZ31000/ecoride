import React, { useState } from 'react';
import { Form, Button, Row, Col } from 'react-bootstrap';
import './SearchForm.css';

function SearchForm() {
    const [depart, setDepart] = useState('');
    const [arrivee, setArrivee] = useState('');

    const handleSubmit = (event) => {
        event.preventDefault();
        // Envoyer la requête de recherche à l'API
        console.log("Recherche de :", depart, "à", arrivee);
        // ... votre logique d'appel API ici ...
    };

    return (
        <Form onSubmit={handleSubmit} className="search-form">
            <Row className="mb-3">
                <Col md={6}>
                    <Form.Group controlId="depart">
                        <Form.Label>Ville de départ:</Form.Label>
                        <Form.Control
                            type="text"
                            placeholder="Entrez la ville de départ"
                            value={depart}
                            onChange={(e) => setDepart(e.target.value)}
                            required
                        />
                    </Form.Group>
                </Col>
                <Col md={6}>
                    <Form.Group controlId="arrivee">
                        <Form.Label>Ville d'arrivée:</Form.Label>
                        <Form.Control
                            type="text"
                            placeholder="Entrez la ville d'arrivée"
                            value={arrivee}
                            onChange={(e) => setArrivee(e.target.value)}
                            required
                        />
                    </Form.Group>
                </Col>
            </Row>
            <Button variant="primary" type="submit" className="search-button">
                Rechercher
            </Button>
        </Form>
    );
}

export default SearchForm;