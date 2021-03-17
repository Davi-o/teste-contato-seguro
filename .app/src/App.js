import React, {Component } from 'react'
import api from './services/Api'
import './assets/style.css'

class App extends Component {
    constructor(props) {
        super(props);
        this.state = {contacts: []};

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleNewContact = this.handleNewContact.bind(this);
    }

    handleChange(event) {
        const target = event.target
        const value = target.value
        const name = target.name

        this.setState({[name]: value})
    }

    async handleNewContact(event){
        event.preventDefault()


        const userData = [
            this.state.name,
            this.state.age,
            this.state.phoneNumber,
            this.state.email
        ]

        try {
            await api.post('/new-contact', {userData})
        } catch (err) {
            console.error(err)
        }
    }

    async handleSubmit(event){

        event.preventDefault();
    }

    async handleDelete(id){

        try {
            await api.delete(`/delete-contact/${id}`, {
                headers: {
                    method: 'DELETE'
                }
            })

            const response = await api.get('/contacts')
            this.setState({contacts: response.data})

        } catch (error) {
            console.error(error)

        }
    }

    async componentDidMount() {
        const response = await api.get('/contacts')
        this.setState({contacts: response.data})
    }

    render() {

        const { contacts } = this.state

        return (
            <div>
                <h1>
                    Contatos
                </h1>
                <form onSubmit={this.handleSubmit}>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>
                            <button
                                className="addContactButton"
                                onClick= {
                                    () => this.handleNewContact()
                                } > Adicionar
                            </button>
                        </th>
                    {contacts.map(contact => (
                        <tr id ={contact.id} key={contact.id}>
                            <td>{contact.name}</td>
                            <td>{contact.age}</td>
                            <td>{contact.phoneNumber}</td>
                            <td>{contact.email}</td>
                            <td colSpan="2">
                                <button type="submit">edit</button>
                                <button
                                    className="deleteButton"
                                    onClick={() => this.handleDelete(contact.id)}>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    ))}
                </form>
                <form onSubmit={this.handleNewContact}className="NewContactForm">
                    <input className="textInput" type="text" onChange={this.handleChange} value={this.state.name} />
                    <input className="textInput" type="number"  onChange={this.handleChange} value={this.state.age} />
                    <input className="textInput" type="text" onChange={this.handleChange} value={this.state.phoneNumber} />
                    <input className="textInput" type="email" onChange={this.handleChange} value={this.state.email} />
                    <input className="SubmitButton" type="submit" value="Enviar" />
                </form>
            </div>
        )
    }
}

export default App
