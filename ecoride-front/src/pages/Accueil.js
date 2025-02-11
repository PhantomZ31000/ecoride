import React from 'react';
import HeroSection from '../components/HeroSection';
import HowItWorks from '../components/HowItWorks';
import Avantages from '../components/Avantages';
import Temoignages from '../components/Temoignages';

function Accueil() {
  return (
    <div>
      <HeroSection />
      <HowItWorks />
      <Avantages />
      <Temoignages />
    </div>
  );
}

export default Accueil;