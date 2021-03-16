import React, {Component} from 'react';
import api from './services/Api';

class App extends Component {

    state = {
        contacts: [],
    }

    async handleSubmit(e){

    };

    async componentDidMount() {
        const response = await api.get('/contacts');
        this.setState({contacts: response.data});
    }

    render() {

        const { contacts } = this.state;

        return (
            <div>
                <h1>
                    Contatos
                </h1>
                <form onSubmit={this.handleSubmit}>
                    <thead>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th><button>Adicionar</button></th>
                    </thead>
                    <tbody>
                        {contacts.map(contact => (
                            <tr id ={contact.id} key={contact.id}>
                                <td>{contact.name}</td>
                                <td>{contact.age}</td>
                                <td>{contact.phoneNumber}</td>
                                <td>{contact.email}</td>
                                <td colSpan="2">
                                    <button type="submit">edit</button>
                                    <button type="submit">delete</button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </form>
            </div>
        );
    }
}

export default App;
