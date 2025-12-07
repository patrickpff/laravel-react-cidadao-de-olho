import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './views/app/App';
import reportWebVitals from './reportWebVitals';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'font-awesome/css/font-awesome.min.css';
import Header from './components/Header';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { createHashHistory } from 'history';
import ListDeputado from './views/deputado/list/ListDeputado';
import ListPartido from './views/partido/list/ListPartido';

ReactDOM.render(
  <React.StrictMode>
    <Header />
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<App />} />
        <Route path="/deputados" element={<ListDeputado />} />
        <Route path="/partidos" element={<ListPartido />} />
      </Routes>
    </BrowserRouter>
  </React.StrictMode>,
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
