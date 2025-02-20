import React, { useState } from 'react';
import { Form, Button, Row, Col } from 'react-bootstrap';
import './SearchForm.css';

function SearchForm() {
    const [depart, setDepart] = useState('');
    const [arrivee, setArrivee] = useState('');

    const handleSubmit = (event) => {
        event.preventDefault();
        // Logique d'appel API de recherche
        console.log("Recherche de :", depart, "à", arrivee);
        
        fetch(`http://127.0.0.1:8000/api/covoiturages?depart=${depart}&arrivee=${arrivee}`)
            .then(response => response.json())
            .then(data => {
                // Traiter les résultats ici
                console.log(data);
            })
            .catch(error => {
                console.error("Erreur lors de la recherche:", error);
            });
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
