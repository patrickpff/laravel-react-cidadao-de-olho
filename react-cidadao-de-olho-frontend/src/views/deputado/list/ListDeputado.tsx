import React, { useEffect, useState } from 'react';
import mainService from "../../../services/main.service";
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import { Container, Col, Row, Card, Button, ListGroup, ListGroupItem } from "react-bootstrap";
import { faEye } from "@fortawesome/free-regular-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

function ListDeputado() {

    const [deputados, setDeputados] = useState([] as any);
    useEffect(() => {
        listDeputados();
    }, []);
    
    const listDeputados = () => {
        mainService.deputadosCompleto().then(   
            (response : any) => {
                setDeputados(response);
            }
        );
    };

    return (
    <div className="App">
      <main className="App-header">
        <Container>
          <Row>
            <Col md={12}>
              <FontAwesomeIcon icon={faEye} /> Lista de Deputados por gastos com verbas indenizatórias.
            </Col>
          </Row>
          <Row className="pt-4">
            <Col md={12}>
              <Card bg="dark">
                <Card.Header>Deputados que mais gastaram</Card.Header>
                <ListGroup>
                    {deputados.length > 0 && deputados.map((deputados: any) => 
                      <ListGroupItem variant="secondary">
                        <Row>
                          <Col md={8}>
                            {deputados.nome} ({deputados.partido})
                          </Col>
                          <Col md={4}>
                            { deputados.verbas_indenizatorias_sum_valor_reembolsado ? deputados.verbas_indenizatorias_sum_valor_reembolsado.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'}) : (0.0).toLocaleString('pt-br', {style: 'currency', currency: 'BRL'}) }
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
export default ListDeputado;