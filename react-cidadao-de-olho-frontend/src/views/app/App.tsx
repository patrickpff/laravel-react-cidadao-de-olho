import React, { useEffect, useState } from 'react';
import mainService from "../../services/main.service";
// import logo from '../../logo.svg';
import './App.css';
import { Link } from "react-router-dom";
//import { Link } from "react-router";
import { Container, Col, Row, Card, Button, ListGroup, ListGroupItem, Spinner } from "react-bootstrap";
import { render } from "react-dom";
import { faEye } from "@fortawesome/free-regular-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { createNamedExports, updateDefaultClause } from 'typescript';
import axios from 'axios';

function App() {

  const [loading, setLoading] = useState(false);

  const [deputadosMaisGastaram, setDeputadosMaisGastaram] = useState([] as any);
  useEffect(() => {
    listDeputadosMaisGastaram();
  }, []);

  const listDeputadosMaisGastaram = () => {
    mainService.deputadosMaisGastaram().then(
        (response : any) => {
          setDeputadosMaisGastaram(response);
        }
    );
  };

  const [partidosMaisGastaram, setPartidosMaisGastaram] = useState([] as any);
  useEffect(() => {
    listPartidosMaisGastaram();
  }, []);

  const listPartidosMaisGastaram = () => {
    mainService.partidosMaisGastaram().then(
        (response : any) => {
          setPartidosMaisGastaram(response);
        }
    );
  };

  const updateData = () => () => {
    setLoading(true);
    mainService.sincronizar().then(
      (response : any) => {
        setLoading(false);
      }
    );
  };

  return (
    <div className="App">
      <main className="App-header">
        <Container>
          <Row>
            <Col md={12}>
              <FontAwesomeIcon icon={faEye} /> Seja bem vindo ao Cidadão de Olho.
            </Col>
          </Row>
          <Row>
            <Col md={12}>
              Acompanhe aqui os gastos com verbas indenizatórias por políticos e partidos. Fique de olho.
            </Col>
          </Row>
          <Row className="pt-2">
            <Col>
              {!loading ? (
                <Button onClick={updateData()}>Clique aqui pra sincronizar as informações</Button>
                ) : (
                <Button variant="primary" disabled>
                  <Spinner
                    as="span"
                    animation="border"
                    size="sm"
                    role="status"
                    aria-hidden="true"
                  />
                  <span className="visually-hidden">Carregando...</span>
                </Button>)}
            </Col>
          </Row>
          <Row className="pt-4">
            <Col md={6} sm={12} xs={12}>
              <Card bg="dark">
                <Card.Header>Deputados que mais gastaram</Card.Header>
                <ListGroup>
                    {deputadosMaisGastaram.length > 0 && deputadosMaisGastaram.map((deputados: any) => 
                      <ListGroupItem variant="secondary">
                        <Row>
                          <Col md={8}>
                            {deputados.nome} ({deputados.partido})
                          </Col>
                          <Col md={4}>
                            {deputados.verbas_indenizatorias_sum_valor_reembolsado.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'})}
                          </Col>
                        </Row>
                      </ListGroupItem>
                    )}
                </ListGroup>
                <Card.Footer>
                  <Link className='btn btn-info btn-lg' to="/deputados">Ver lista completa</Link>
                </Card.Footer>
              </Card>
            </Col>
            <Col md={6} sm={12} xs={12}>
              <Card bg="dark">
                <Card.Header>Partidos que mais gastaram</Card.Header>
                {/* <Card.Body>
                
                </Card.Body> */}
                <ListGroup>
                    {partidosMaisGastaram.length > 0 && partidosMaisGastaram.map((partidos: any) => 
                      <ListGroupItem variant="secondary">
                        <Row>
                          <Col md={8}>
                            {partidos.partido}
                          </Col>
                          <Col md={4}>
                            {partidos.valor_reembolsado_partido.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'})}
                          </Col>
                        </Row>
                      </ListGroupItem>
                    )}
                </ListGroup>

                <Card.Footer>
                  <Link className='btn btn-info btn-lg' to="/partidos">Ver lista completa</Link>
                </Card.Footer>
              </Card>
            </Col>
          </Row>
        </Container>
      </main>
    </div>
  );
}

export default App;
