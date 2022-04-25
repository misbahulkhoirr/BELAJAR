import React from 'react'
import {Form, Button, Container, Row, Col} from 'react-bootstrap'

const FormInput = ({nama_depan, nama_belakang, alamat, handleChange, handleSubmit}) => {
    return (
            <Container>
                <Row>
                    <Col>
                    <h4 className="text-center">Tambah Data</h4>
                    </Col>
                    </Row>
            <Form onSubmit={handleSubmit}>
                <Form.Group className="mb-3" controlId="nama_depan">
                    <Form.Label className="fw-bold">Nama Depan</Form.Label>
                    <Form.Control type="text" name="nama_depan" value={nama_depan} onChange={(event) => handleChange(event)} />
                </Form.Group>
                <Form.Group className="mb-3" controlId="nama_belakang">
                    <Form.Label className="fw-bold">Nama Belakang</Form.Label>
                    <Form.Control type="text" name="nama_belakang" value={nama_belakang} onChange={(event)=>handleChange(event)} />
                </Form.Group>

                <Form.Group className="mb-3" controlId="alamat">
                    <Form.Label className="fw-bold">Alamat</Form.Label>
                    <Form.Control as="textarea" type="text" name="alamat" value={alamat} onChange={(event)=>handleChange(event)} rows={3} />
                </Form.Group>
                <Button variant="primary" type="submit">
                    Tambah Data
                </Button>
            </Form>
            </Container>
    )
}

export default FormInput
