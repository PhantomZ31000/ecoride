import React, { useState } from 'react';
import { Form, Button, Alert } from 'react-bootstrap';
import './InscriptionForm.css';

function InscriptionForm() {
    const [pseudo, setPseudo] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [confirmPassword, setConfirmPassword] = useState('');
    const [error, setError] = useState(null); // Pour afficher les erreurs
    const [success, setSuccess] = useState(null); // Pour afficher un message de succès

    const handleSubmit = async (event) => {
        event.preventDefault();

        setError(null); // Réinitialise les erreurs
        setSuccess(null); // Réinitialise le message de succès

        // Vérification de la cohérence des mots de passe
        if (password !== confirmPassword) {
            setError('Les mots de passe ne correspondent pas.');
            return;
        }

        // Vérification de la validité de l'email
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            setError('L\'adresse email n\'est pas valide.');
            return;
        }

        try {
            const response = await fetch('http://127.0.0.1:8000/api/users', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ pseudo, email, password }), // Envoie du mot de passe en texte brut
            });

            if (response.ok) {
                setSuccess('Inscription réussie ! Vous allez être redirigé vers la page de connexion.');
                setTimeout(() => {
                    window.location.href = '/connexion';
                }, 3000); // Redirection après 3 secondes
            } else {
                const data = await response.json();
                setError(data.message || 'Erreur lors de l\'inscription.'); // Afficher le message d'erreur de l'API ou un message générique
            }
        } catch (error) {
            console.error('Erreur lors de l\'inscription:', error);
            setError('Une erreur est survenue lors de l\'inscription.');
        }
    };

    return (
        <Form onSubmit={handleSubmit} className="inscription-form">
            {error && <Alert variant="danger">{error}</Alert>} {/* Affichage des erreurs */}
            {success && <Alert variant="success">{success}</Alert>} {/* Affichage du message de succès */}

            <Form.Group controlId="pseudo">
                <Form.Label>Pseudo:</Form.Label>
                <Form.Control
                    type="text"
                    placeholder="Entrez votre pseudo"
                    value={pseudo}
                    onChange={(e) => setPseudo(e.target.value)}
                    required // Champ obligatoire
                />
            </Form.Group>

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
                    minLength={6} // Mot de passe d'au moins 6 caractères
                />
            </Form.Group>

            <Form.Group controlId="confirmPassword">
                <Form.Label>Confirmer le mot de passe:</Form.Label>
                <Form.Control
                    type="password"
                    placeholder="Confirmez votre mot de passe"
                    value={confirmPassword}
                    onChange={(e) => setConfirmPassword(e.target.value)}
                    required
                />
            </Form.Group>

            <Button variant="primary" type="submit" className="mt-3">
                S'inscrire
            </Button>
        </Form>
    );
}

export default InscriptionForm;
