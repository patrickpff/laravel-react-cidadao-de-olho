import React, { useEffect, useState } from 'react';
import mainService from "../../../services/main.service";
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import { Container, Col, Row, Card, Button, ListGroup, ListGroupItem } from "react-bootstrap";
import { faEye } from "@fortawesome/free-regular-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

function ListPartido() {

    const [partidos, setPartidos] = useState([] as any);
    useEffect(() => {
        listPartidos();
    }, []);
    
    const listPartidos = () => {
        mainService.partidosCompleto().then(   
            (response : any) => {
                setPartidos(response);
            }
        );
    };

    return (
    <div className="App">
      <main className="App-header">
        <Container>
          <Row>
            <Col md={12}>
              <FontAwesomeIcon icon={faEye} /> Lista de Partidos por gastos com verbas indenizatórias.
            </Col>
          </Row>
          <Row className="pt-4">
            <Col md={12}>
              <Card bg="dark">
                <Card.Header>Partidos que mais gastaram</Card.Header>
                <ListGroup>
                    {partidos.length > 0 && partidos.map((partidos: any) => 
                      <ListGroupItem variant="secondary">
                        <Row>
                          <Col md={8}>
                            {partidos.partido}
                          </Col>
                          <Col md={4}>
                          { partidos.valor_reembolsado_partido ? partidos.valor_reembolsado_partido.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'}) : (0.0).toLocaleString('pt-br', {style: 'currency', currency: 'BRL'}) }
                          </Col>
                        </Row>
                      </ListGroupItem>
                    )}
                </ListGroup>
                <Card.Footer>
                    <Link className='btn btn-info btn-lg' to="/">Voltar</Link>
                </Card.Footer>
              </Card>
            </Col>
          </Row>
        </Container>
      </main>
    </div>
    );
}
export default ListPartido;