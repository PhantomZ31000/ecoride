import React from 'react';
import HeroSection from '../components/HeroSection';
import HowItWorks from '../components/HowItWorks';
import Avantages from '../components/Avantages';
import Temoignages from '../components/Temoignages';
import Footer from '../components/Footer';
import './Accueil.css';

function Accueil() {
  return (
    <div>
      <HeroSection />
      <Avantages />
      <Temoignages />
      <Footer />
    </div>
  );
}

export default Accueil;