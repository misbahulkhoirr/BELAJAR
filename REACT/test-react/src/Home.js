import React from 'react'
import {Image} from 'react-bootstrap';
import NavbarComponent from './crud/NavbarComponent';

const Home = () => {
    return (
        <div>
            <NavbarComponent />
            <Image src="holder.js/100px250" fluid />
        </div>
        
    )
}
export default Home
