import React from 'react';
import CreationCompteEmploye from '../components/CreationCompteEmploye';
import GraphiqueCovoiturages from '../components/GraphiqueCovoiturages';
import GraphiqueCredits from '../components/GraphiqueCredits';
import TotalCredits from '../components/TotalCredits';
import GestionComptes from '../components/GestionComptes';

function EspaceAdministrateur() {
  return (
    <div>
      <h1>Espace Administrateur</h1>
      <CreationCompteEmploye />
      <GraphiqueCovoiturages />
      <GraphiqueCredits />
      <TotalCredits />
      <GestionComptes />
    </div>
  );
}

export default EspaceAdministrateur;