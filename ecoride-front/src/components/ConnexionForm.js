import React, { useState } from 'react';
import { Form, Button, Alert } from 'react-bootstrap';
import { useNavigate } from 'react-router-dom';  // Utilisation de useNavigate pour la redirection
import './ConnexionForm.css';

function ConnexionForm() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState(null);
    const [isLoading, setIsLoading] = useState(false);  // Ajout d'un état pour gérer le chargement
    const navigate = useNavigate();  // Pour la redirection après connexion réussie

    const handleSubmit = async (event) => {
        event.preventDefault();
        setError(null);  // Réinitialise l'erreur
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
                navigate('/');
            } else {
                if (response.status === 401) {
                    setError('Identifiants incorrects.');  // Affichage d'un message d'erreur spécifique
                } else {
                    const data = await response.json();
                    setError(data.message || 'Erreur lors de la connexion.');
                }
            }
        } catch (error) {
            console.error('Erreur lors de la connexion:', error);
            setError('Une erreur est survenue lors de la connexion.');
        }

        setIsLoading(false);  // Arrête le chargement
    };

    return (
        <Form onSubmit={handleSubmit} className="connexion-form">
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

            <Button variant="primary" type="submit" className="mt-3" disabled={isLoading}>
                {isLoading ? 'Chargement...' : 'Connexion'}  {/* Affichage du texte de bouton en fonction de l'état */}
            </Button>
        </Form>
    );
}

export default ConnexionForm;
