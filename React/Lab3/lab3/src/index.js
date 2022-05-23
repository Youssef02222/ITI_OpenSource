import { Component } from 'react';
import ReactDom from 'react-dom/client'
import './index.css';
import 'bootstrap/dist/css/bootstrap.css';
import 'jquery/dist/jquery';
import 'bootstrap/dist/js/bootstrap.bundle';
import App from './App.js';

let root = ReactDom.createRoot(document.querySelector("#root"));
root.render(<App />);