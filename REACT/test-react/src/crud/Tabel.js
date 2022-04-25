import React from 'react'
import {Table, Container} from 'react-bootstrap'

const Tabel = ({user}) => {
    return (
        <Container className="mb-5">
        <Table striped bordered hover>
            <thead>
                <tr>
                <th>#</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>ALamat</th>
                </tr>
            </thead>
            <tbody>
                {user.map((user, index)=>{
                    return(
                    // console.log("data :",user)
                <tr>
                <td>{index+1}</td>
                <td>{user.nama_depan}</td>
                <td>{user.nama_belakang}</td>
                <td>{user.alamat}</td>
                </tr>
                    );
                })}
            </tbody>
        </Table>
        </Container>
    )
}

export default Tabel
