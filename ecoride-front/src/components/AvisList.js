import React from 'react';
import './AvisList.css';

function AvisList({ avis }) {
  return (
    <div>
      <h3>Avis</h3>
      {avis.map((avi) => (
        <div key={avi.id}>
          <p>{avi.commentaire}</p>
          <p>Note: {avi.note} / 5</p>
          {/* Afficher les autres informations de l'avis (auteur, date, etc.) */}
          {/*... */}
        </div>
      ))}
    </div>
  );
}

export default AvisList;