import React from 'react';
import CreationCompteEmploye from '../components/CreationCompteEmploye';
import GraphiqueCovoiturages from '../components/GraphiqueCovoiturages';
import GraphiqueCredits from '../components/GraphiqueCredits';
import TotalCredits from '../components/TotalCredits';
import GestionComptes from '../components/GestionComptes';

function EspaceAdministrateur() {
  return (
    <div className="admin-dashboard">
      <h1>Espace Administrateur</h1>
      
      <section className="admin-section">
        <h2>Création de compte Employé</h2>
        <CreationCompteEmploye />
      </section>

      <section className="admin-section">
        <h2>Graphique Covoiturages</h2>
        <GraphiqueCovoiturages />
      </section>

      <section className="admin-section">
        <h2>Graphique des Crédits</h2>
        <GraphiqueCredits />
      </section>

      <section className="admin-section">
        <h2>Total des Crédits</h2>
        <TotalCredits />
      </section>

      <section className="admin-section">
        <h2>Gestion des Comptes</h2>
        <GestionComptes />
      </section>
    </div>
  );
}

export default EspaceAdministrateur;
