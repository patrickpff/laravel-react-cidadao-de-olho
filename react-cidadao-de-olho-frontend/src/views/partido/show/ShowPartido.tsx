import React, { useEffect, useState } from 'react';
import mainService from "../../../services/main.service";
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
function ShowPartido() {

    const [partidos, setPartidos] = useState([] as any);
    useEffect(() => {
        showPartidos();
    }, []);
    
    const showPartidos = () => {
        mainService.partidosCompleto().then(   
            (response : any) => {
                setPartidos(response);
            }
        );
    };

    return (
        <>
            <main className="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div className="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 className="h2">Lista de Deputados</h1>
                </div>
                <h2>Section title</h2>
                <div className="table-responsive">
                    <table className="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                        {/* {deputados.length > 0 && deputados.map((deputado : any) => 
                            <tr>
                                <td>{deputado.id}</td>
                                <td>{deputado.name}</td>
                            </tr>
                        )} */}
                        </tbody>
                    </table>
                </div>
            </main>
        </>
    );
}
export default ShowPartido;