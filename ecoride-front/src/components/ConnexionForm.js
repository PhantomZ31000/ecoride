import React, { useState } from 'react';
import { Form, Button, Alert } from 'react-bootstrap';
import './ConnexionForm.css';

function ConnexionForm() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState(null);

    const handleSubmit = async (event) => {
        event.preventDefault();
        setError(null); // Réinitialise l'erreur

        try {
            const response = await fetch('/api/login', {
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
    };

    return (
        <Form onSubmit={handleSubmit} className="connexion-form"> {/* Ajout d'une classe pour le style */}
            {error && <Alert variant="danger">{error}</Alert>} {/* Affichage de l'erreur */}

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

            <Button variant="primary" type="submit" className="mt-3">
                Connexion
            </Button>
        </Form>
    );
}

export default ConnexionForm;