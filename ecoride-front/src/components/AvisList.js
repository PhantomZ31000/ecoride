import React from 'react';
import './AvisList.css';

function AvisList({ avis }) {
  if (!avis || avis.length === 0) {
    return <div>Aucun avis disponible.</div>;
  }

  return (
    <div>
      <h3>Avis</h3>
      {avis.map((avi) => (
        <div key={avi.id} className="avis-item">
          <p><strong>Commentaire:</strong> {avi.commentaire}</p>
          <p><strong>Note:</strong> {avi.note} / 5</p>
          {avi.auteur && <p><strong>Auteur:</strong> {avi.auteur}</p>}
          {avi.date && <p><strong>Date:</strong> {avi.date}</p>}
        </div>
      ))}
    </div>
  );
}

export default AvisList;
