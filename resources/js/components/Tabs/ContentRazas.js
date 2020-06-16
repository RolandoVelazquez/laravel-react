import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import M from "materialize-css";


class ContentRazas extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            informacion: {},
            isLoaded: false,
            sexo:1,
            nombre:'',
            tamanoId:1,
            razaId:1,
            fechaNacimiento:'',
            senasParticulares:'',
            foto:''

        }
        this.handleNombre = this.handleNombre.bind(this);
        this.handleSenas = this.handleSenas.bind(this);
        this.dropdownChangeSexo = this.dropdownChangeSexo.bind(this);
        this.dropdownChangeRaza = this.dropdownChangeRaza.bind(this);
        this.dropdownChangeTamano = this.dropdownChangeTamano.bind(this);
        this.submitButton = this.submitButton.bind(this);
        this.ButtonDelete = this.ButtonDelete.bind(this);
        this.changeFechaNacimiento = this.changeFechaNacimiento.bind(this);
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
            M.FloatingActionButton.init(this.floatingButton);
            M.FormSelect.init(this.SelectSexo);
            M.FormSelect.init(this.SelectTamano);
            M.FormSelect.init(this.SelectRaza);
        })

    }

    dropdownChangeSexo(e){
        this.setState({sexo: e.target.value});
    }
    dropdownChangeRaza(e){
        this.setState({razaId: e.target.value});
    }
    handleNombre(e){
        this.setState({
            nombre:e.target.value
        })
    }
    handleSenas(e){
        this.setState({
            senasParticulares:e.target.value
        })
    }
    dropdownChangeTamano(e){
        this.setState({tamanoId: e.target.value});
    }
    changeFechaNacimiento(e){
        this.setState({fechaNacimiento: e.target.value})
    }

    submitButton(event){
        event.preventDefault();
        const {nombre, senasParticulares, sexo, tamanoId, fechaNacimiento, razaId} = this.state;
        let infoPerrito = {
            nombre: nombre,
            senas_particulares: senasParticulares,
            sexo: sexo,
            tamano_id: tamanoId,
            raza_id: razaId,
            fecha_nacimiento: fechaNacimiento,
        }
        axios.post('/add-perrito', infoPerrito).then(res=>{
           if (res.data.complete){
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
               });
               this.setState({
                   nombre:"",
                   senasParticulares:"",
                   sexo:1,
                   tamanoId:1,
                   fechaNacimiento:"",
                   razaId:1
               })
               M.Modal.init(this.Modal).close();
               M.updateTextFields();

           }
        });
    }
    ButtonDelete(id){
        axios.delete(`/delete-perrito/${id}`).then(res=>{
            if (res.data.complete){
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
                });
            }
        });
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
                                        <ul className="collapsible popout">
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
                                                        <br/>
                                                        <a className="btn-small yellow darken-1">Editar</a> <br/> <br/>
                                                        <a className="btn-small red darken-2" onClick={()=>this.ButtonDelete(perrito.id)}>Eliminar</a>
                                                    </div>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                    <div className="fixed-action-btn"  ref={floatingButton=>{this.floatingButton = floatingButton;}}>
                        <a className="btn-floating btn-large">
                            <i className="large material-icons">apps</i>
                        </a>
                        <ul>
                            <li><a className="btn-floating red"><i className="material-icons">delete</i></a></li>
                            <li><a className="btn-floating yellow darken-1"><i className="material-icons">edit</i></a></li>
                            <li><a className="btn-floating green modal-trigger" href="#modaladd"><i className="material-icons">add</i></a></li>
                        </ul>
                    </div>
                   {/* <div className="fixed-action-btn">
                        <a className="btn-floating btn-large modal-trigger" href="#modal1"> <i
                            className="large material-icons">mode_edit</i>
                        </a>
                    </div>*/}
                    <div ref={Modal => {this.Modal = Modal;}} id="modaladd" className="modal bottom-sheet">
                        <div className="modal-content">
                            <h4>Agregar Perrito</h4>
                            <div className="container">
                                <div className="row">
                                    <form className="col s12">
                                        <div className="row">
                                            <div className="input-field col s6">
                                                <input id="nombre" type="text"  value={this.state.nombre} onChange={this.handleNombre}/>
                                                <label htmlFor="nombre">Nombre</label>
                                            </div>
                                            <div className="input-field col s6">
                                                <select ref={SelectSexo=>{this.SelectSexo = SelectSexo;}} defaultValue={this.state.sexo} onChange={this.dropdownChangeSexo.bind(this)}>
                                                    <option value="0" disabled>Selecciona una opción</option>
                                                    <option value="1">Macho</option>
                                                    <option value="2">Hembra</option>
                                                </select>
                                                <label>Sexo</label>
                                            </div>
                                        </div>
                                       <div className="row">
                                           <div className="input-field col s6">
                                               <input id="fechaNacimiento" type="text"  value={this.state.fechaNacimiento} onChange={this.changeFechaNacimiento}/>
                                               <label htmlFor="fechaNacimiento">Fecha Nacimiento (yyyy-mm-dd)</label>
                                           </div>
                                           <div className="input-field col s6">
                                               <select ref={SelectTamano=>{this.SelectTamano = SelectTamano;}} defaultValue={this.state.tamanoId} onChange={this.dropdownChangeTamano.bind(this)}>
                                                   <option value="0" disabled>Selecciona una opción</option>
                                                   <option value="1">Pequeño</option>
                                                   <option value="2">Mediano</option>
                                                   <option value="3">Grande</option>
                                               </select>
                                               <label>Tamaño</label>
                                           </div>
                                       </div>
                                        <div className="row">
                                            <div className="input-field col s6">
                                                <input id="senasparticulares" type="text"  defaultValue={this.state.senasParticulares} onChange={this.handleSenas.bind(this)}/>
                                                <label htmlFor="senasparticulares">Señas Particulares</label>
                                            </div>
                                            <div className="input-field col s6">
                                                <select ref={SelectRaza=>{this.SelectRaza = SelectRaza;}} defaultValue={this.state.razaId} onChange={this.dropdownChangeRaza.bind(this)}>
                                                    <option value="0" disabled>Selecciona una opción</option>
                                                    <option value="1">American Bully</option>
                                                    <option value="2">Shorkie</option>
                                                    <option value="3">Pincher Aleman</option>
                                                    <option value="4">Border Collie</option>
                                                    <option value="5">Bóxer</option>
                                                </select>
                                                <label>Raza</label>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col s12">
                                                <button className="btn " onClick={this.submitButton}>
                                                        Enviar
                                                    <i className="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
