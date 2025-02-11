import React from 'react';
import { Row, Col } from 'react-bootstrap';
import CovoiturageCard from './CovoiturageCard';
import './ResultList.css';

function ResultList({ covoiturages }) {
  if (!covoiturages) {
    return <div>Chargement...</div>;
  }

  return (
    <Row>
      {covoiturages.map((covoiturage) => (
        <Col md={4} key={covoiturage.id}>
          <CovoiturageCard covoiturage={covoiturage} />
        </Col>
      ))}
    </Row>
  );
}

export default ResultList;