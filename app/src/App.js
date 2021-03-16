import React, {Component} from 'react';
import api from './services/Api';

class App extends Component {

    state = {
        contacts: [],
    }

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
                <table>
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
                                <td colspan="2"><button>edit</button><button>delete</button></td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        );
    }
}

export default App;
