import React, { useState, useEffect } from 'react';
import './GestionComptes.css';

function GestionComptes() {
  const [users, setUsers] = useState();

  useEffect(() => {
    // Récupérer la liste des utilisateurs depuis l'API
    fetch('/api/users') // Remplacez par l'URL correcte de votre API
    .then(response => response.json())
    .then(data => setUsers(data));
  },);

  const handleSuspendreCompte = async (userId) => {
    try {
      const response = await fetch(`/api/users/${userId}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ enabled: false }), // Mettez à jour le statut du compte
      });

      if (response.ok) {
        // Mettre à jour la liste des utilisateurs
        setUsers(users.map(user =>
          user.id === userId? {...user, enabled: false }: user
        ));
      } else {
        // Afficher un message d'erreur
        const data = await response.json();
        alert(data.message);
      }
    } catch (error) {
      console.error('Erreur lors de la suspension du compte:', error);
      alert('Une erreur est survenue lors de la suspension du compte.');
    }
  };

  const handleActiverCompte = async (userId) => {
    // Même logique que handleSuspendreCompte, mais avec enabled: true
  };

  return (
    <div>
      <h2>Gestion des comptes</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Statut</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {users.map((user) => (
            <tr key={user.id}>
              <td>{user.id}</td>
              <td>{user.pseudo}</td>
              <td>{user.email}</td>
              <td>{user.roles.join(', ')}</td>
              <td>{user.enabled? 'Actif': 'Suspendu'}</td>
              <td>
                {user.enabled? (
                  <button onClick={() => handleSuspendreCompte(user.id)}>Suspendre</button>
                ): (
                  <button onClick={() => handleActiverCompte(user.id)}>Activer</button>
                )}
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default GestionComptes;