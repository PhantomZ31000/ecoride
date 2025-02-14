import React from 'react';
import './Footer.css';  // Importez votre fichier CSS

function Footer() {
  const currentYear = new Date().getFullYear();

  return (
    <footer className="footer">
      <div className="container">
        <div className="footer-content">

          <div className="footer-section"> {/* Exemple de section */}
            <h4>À propos</h4>
            <ul>
              <li><a href="#">Notre histoire</a></li>
              <li><a href="#">Équipe</a></li>
              <li><a href="#">Carrières</a></li>
            </ul>
          </div>

          <div className="footer-section"> {/* Exemple de section */}
            <h4>Services</h4>
            <ul>
              <li><a href="#">Service 1</a></li>
              <li><a href="#">Service 2</a></li>
              <li><a href="#">Service 3</a></li>
            </ul>
          </div>

          <div className="footer-section"> {/* Exemple de section */}
            <h4>Contact</h4>
            <ul>
              <li><a href="#">Nous contacter</a></li>
              <li><a href="#">FAQ</a></li>
            </ul>
          </div>
          
          <div className="footer-section"> {/* Exemple de section - Réseaux Sociaux */}
            <h4>Suivez-nous</h4>
            <ul className="social-media">
              <li><a href="#"><i className="fab fa-facebook-f"></i></a></li> {/* Font Awesome */}
              <li><a href="#"><i className="fab fa-twitter"></i></a></li>
              <li><a href="#"><i className="fab fa-instagram"></i></a></li>
            </ul>
          </div>

        </div>

        <div className="footer-bottom">
          <p>&copy; {currentYear} EcoRide. Tous droits réservés.</p>
        </div>
      </div>
    </footer>
  );
}

export default Footer;