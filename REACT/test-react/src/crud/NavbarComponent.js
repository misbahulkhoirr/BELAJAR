import React from 'react';
import {Navbar, Nav, Container, NavDropdown} from 'react-bootstrap';

const NavbarComponent = () => {
    return (
        <Navbar bg="light" expand="lg" className="mb-5">
            <Container>
                <Navbar.Brand href="#home" className="fw-bold">Belajar</Navbar.Brand>
                <Navbar.Toggle aria-controls="basic-navbar-nav" />
                <Navbar.Collapse id="basic-navbar-nav">
                <Nav className="ms-auto mb-3">
                    <Nav.Link href="#home" className="fw-bold">Home</Nav.Link>
                    <Nav.Link href="#link" className="fw-bold">Artikel</Nav.Link>
                    <NavDropdown className="fw-bold" title="Produk" id="basic-nav-dropdown">
                    <NavDropdown.Item href="#action/3.1">Action</NavDropdown.Item>
                    <NavDropdown.Item href="#action/3.2">Another action</NavDropdown.Item>
                    <NavDropdown.Item href="#action/3.3">Something</NavDropdown.Item>
                    <NavDropdown.Divider />
                    <NavDropdown.Item href="#action/3.4">Separated link</NavDropdown.Item>
                    </NavDropdown>
                </Nav>
                </Navbar.Collapse>
            </Container>
        </Navbar>
    )
}

export default NavbarComponent
