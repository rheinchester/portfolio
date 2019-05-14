import React from 'react';
import PropTypes from 'prop-types';
import {BrowserRouter as Router, Link, Route} from 'react-router-dom';
import Home from './Home';
import About from './About';

function Header(props) {
  return (
    <Router>
      <div>
        <Link to="/">Home</Link>
        <Link to="/about">About us</Link>

        <Route path ="/" component={Home}/>
        <Route path ="/about" component={About}/>
      </div> 
    </Router>
  )
}

Header.propTypes = {

}

export default Header

