import React, { Component } from 'react';
import NavbarComponent from './NavbarComponent';
import Tabel from './Tabel';
import FormInput from './FormInput';

export default class Crud extends Component {
    constructor(props) {
        super(props)
    
        this.state = {
             user:[],
             id:"",
             nama_depan:"",
             nama_belakang:"",
             alamat:"",
        }
    }
    handleChange =(event) =>{
        this.setState({ 
            [event.target.name] : event.target.value
        })
    }
    handleSubmit =(event) =>{
            event.preventDefault();
            // console.log("data : ",this.state);
            this.setState({
                user:[
                    ...this.state.user,{
                        id:this.state.user.length+1,
                        nama_depan:this.state.nama_depan,
                        nama_belakang:this.state.nama_belakang,
                        alamat:this.state.alamat
                    }
                ]
            })
        }
    
   render() {
        return (
        
            <div>
                <NavbarComponent />
                <Tabel user={this.state.user}/>
                <FormInput {...this.state} handleChange={this.handleChange} handleSubmit={this.handleSubmit}/>
            </div>
            
        )
    }
}
