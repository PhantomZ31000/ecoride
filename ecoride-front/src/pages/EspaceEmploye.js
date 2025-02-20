import React from 'react';
import AvisValidation from '../components/AvisValidation';
import CovoituragesProblemes from '../components/CovoituragesProblemes';

function EspaceEmploye() {
  return (
    <div className="employe-dashboard">
      <h1>Espace Employé</h1>

      <section className="employe-section">
        <h2>Validation des Avis</h2>
        <AvisValidation />
      </section>

      <section className="employe-section">
        <h2>Covoiturages Problématiques</h2>
        <CovoituragesProblemes />
      </section>
    </div>
  );
}

export default EspaceEmploye;
