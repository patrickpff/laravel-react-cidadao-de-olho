import React from "react";

import { BrowserRouter, Routes, Route } from 'react-router-dom';

import ListDeputado  from './list/ListDeputado';
import ShowDeputado from './show/ShowDeputado';

function Deputado() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/deputados" element={<ListDeputado />} />
            </Routes>
        </BrowserRouter>
    )
}
export default Deputado;