import React, { useState, useEffect } from 'react';
import { Container, Row, Col } from 'react-bootstrap';
import SearchForm from '../components/SearchForm';
import ResultList from '../components/ResultList';
import InteractiveMap from '../components/InteractiveMap';

function Recherche() {
  const [covoiturages, setCovoiturages] = useState();

  useEffect(() => {
    // Récupérer les covoiturages depuis l'API
    fetch('http://127.0.0.1:8000/api/covoiturages')
    .then(response => response.json())
    .then(data => setCovoiturages(data));
  },);

  return (
    <Container>
      <h1>Rechercher un covoiturage</h1>
      <Row>
        <Col md={4}>
          <SearchForm />
        </Col>
        <Col md={8}>
          <ResultList covoiturages={covoiturages} />
          <InteractiveMap />
        </Col>
      </Row>
    </Container>
  );
}

export default Recherche;