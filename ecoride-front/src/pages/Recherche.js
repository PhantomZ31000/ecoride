import React, { useState, useEffect } from 'react';
import { Container, Row, Col } from 'react-bootstrap';
import SearchForm from '../components/SearchForm';
import ResultList from '../components/ResultList';
import InteractiveMap from '../components/InteractiveMap';

function Recherche() {
  const [covoiturages, setCovoiturages] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/covoiturage')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        setCovoiturages(data);
        setLoading(false);
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
        setLoading(false);
      });
  }, []);

  if (loading) {
    return <div>Loading...</div>;
  }

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
