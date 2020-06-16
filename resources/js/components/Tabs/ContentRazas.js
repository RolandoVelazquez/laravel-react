import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import M from "materialize-css";


class ContentRazas extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            informacion: {},
            isLoaded: false
        }
    }

    componentDidMount() {
        axios.get('/inforazas').then((res) => {
            this.setState({
                informacion: res.data,
                isLoaded: true
            })
            var tabs = document.querySelectorAll('.tabs')

            for (var i = 0; i < tabs.length; i++) {
                M.Tabs.init(tabs[i]);
            }

            var collapsibles = document.querySelectorAll('.collapsible')
            for (var i = 0; i < collapsibles.length; i++) {
                M.Collapsible.init(collapsibles[i]);
            }
            M.Modal.init(this.Modal);


        })

    }

    render() {
        const {informacion, isLoaded} = this.state;
        if (!isLoaded) {
            return (
                <div><br/><br/><br/>Cargando ...</div>
            )
        } else {
            return (
                <div>
                    <br/>
                    {informacion.map((item) => (
                        <div key={item.id} id={'tab' + item.id} className="col s12">
                            <br/><br/>
                            <div className="container">
                                <div className="row">
                                    <div className="col s12 ">
                                        <ul className="collapsible">
                                            {item.get_perritos.map((perrito) => (
                                                <li key={perrito.id}>
                                                    <div className="collapsible-header"><i
                                                        className="material-icons">pets</i>{perrito.nombre}
                                                    </div>
                                                    <div className="collapsible-body">
                                                        <ul>
                                                            <li><h5 className="blue-text">{perrito.nombre} </h5></li>
                                                            <li><span className="blue-text">Raza: </span> {perrito.get_raza.raza}</li>
                                                            <li><span className="blue-text">Sexo: </span> {perrito.get_sexo.sexo}</li>
                                                            <li><span className="blue-text">Tamaño: </span> {perrito.get_tamano.tamano}</li>
                                                            <li><span className="blue-text">Fecha de nacimiento: </span> {perrito.fecha_nacimiento}</li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                    <div className="fixed-action-btn">
                        <a className="btn-floating btn-large modal-trigger" href="#modal1"> <i
                            className="large material-icons">mode_edit</i>
                        </a>
                    </div>
                    <div ref={Modal => {
                        this.Modal = Modal;
                    }} id="modal1" className="modal bottom-sheet">
                        <div className="modal-content">
                            <h4>Agregar</h4>
                        </div>
                        <div className="modal-footer">
                            <a href="#!" className="modal-close waves-effect waves-green btn-flat">Agree</a>
                        </div>
                    </div>
                </div>
            )
        }

    }
    openModal(){
        var Modal = document.querySelector('.modal')
        var modalInstance = M.Collapsible.init(Modal);
        modalInstance.open();

    }
}

export default ContentRazas;

if (document.getElementById('ContentRazas')) {
    ReactDOM.render(<ContentRazas/>, document.getElementById('ContentRazas'));
}
