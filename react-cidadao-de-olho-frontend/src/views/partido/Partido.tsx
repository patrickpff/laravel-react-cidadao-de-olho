import React from "react";

import { BrowserRouter, Routes, Route } from 'react-router-dom';

import ListPartido  from './list/ListPartido';
import ShowPartido from './show/ShowPartido';

function Partido() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/partidos" element={<ListPartido />} />
            </Routes>
        </BrowserRouter>
    )
}
export default Partido;