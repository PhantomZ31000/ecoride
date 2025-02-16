import React from 'react';
import AvisValidation from '../components/AvisValidation';
import CovoituragesProblemes from '../components/CovoituragesProblemes';

function EspaceEmploye() {
  return (
    <div>
      <h1>Espace Employé</h1>
      <AvisValidation />
      <CovoituragesProblemes />
    </div>
  );
}

export default EspaceEmploye;