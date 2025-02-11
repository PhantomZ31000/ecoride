import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import NavigationBar from './components/NavigationBar'; // Importez le composant NavigationBar
import Accueil from './pages/Accueil'; // Importez la page Accueil
import Recherche from './pages/Recherche'; // Importez la page Recherche
import Proposition from './pages/Proposition'; // Importez la page Proposition
import Profil from './pages/Profil'; // Importez la page Profil
import Connexion from './pages/Connexion'; // Importez la page Connexion
import Inscription from './pages/Inscription'; // Importez la page Inscription
import Covoiturage from './pages/Covoiturage'; // Importez la page Covoiturage

function App() {
  return (
    <Router>
      <div>
        <NavigationBar /> {/* Utilisez le composant NavigationBar */}
        <Routes>
          {/* Définissez les routes pour les différentes pages de votre application */}
          <Route path="/" element={<Accueil />} />
          <Route path="/recherche" element={<Recherche />} />
          <Route path="/proposition" element={<Proposition />} />
          <Route path="/profil" element={<Profil />} />
          <Route path="/connexion" element={<Connexion />} />
          <Route path="/inscription" element={<Inscription />} />
          <Route path="/covoiturage/:covoiturageId" element={<Covoiturage />} />
          {/*... autres routes... */}
        </Routes>
      </div>
    </Router>
  );
}

export default App;