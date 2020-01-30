/*import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>

                            <div className="card-body">I'm an example component!</div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}*/
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
// import Drugi from './Drugi';
// import Treci from './Treci';
// import Peti from './Peti';


// function Example() {
//    function h(){return 5+5}
//         return (
//             <div className="container">
//                         <div>
//                             <div className="card-header">PROBA2</div>
//                             <div>5+5 = {h()}</div>
//                             <div className="card-body">REACT!</div>
//                             <Drugi ime="marko" prezime="markovic" godine="33"/>
//                             <Drugi ime="petar" prezime="petrovic" godine="23"/>
//                             <Drugi ime="ivana" prezime="ivanovic" godine="43"/>
//                             <Treci ime="marko" prezime="markovic" godine="33"/>
//                             <Peti />
//                         </div>
//                 </div>    
//         );
//     }

 

class Example extends Component{
    constructor(){
        super();
        this.state={
            time:{
                date: "",
                hours: ""
            },
            place:{
                region:"europe",
                location:"belgrade"
            }
        };
        this.fetchData=this.fetchData.bind(this);
        this.handleSelect = this.handleSelect.bind(this)
    }

    fetchData(){
        let timeUrl=`http://worldtimeapi.org/api/timezone/${this.state.place.region}/${this.state.place.location}`;
            (async () => {
                let response = await fetch(timeUrl);
                let data = await response.json();
                this.setState(
                    {
                        time:{
                            date: new Date(data.datetime.substring(0,19)).toLocaleDateString(),
                            hours: new Date(data.datetime.substring(0,19)).toLocaleTimeString()
                        }
                    }

                );
            })();
    }

    componentDidMount(){
        this.fetchData()
    }

    handleSelect(e){
        let location = e.target.value;
        let region = location === "tokyo" ? "asia" : "europe";
        this.setState(
            {
                place: {
                    region:region,
                    location:location
                }
            },
            ()=>this.fetchData()
        );
    }

    render(){
        return (
            <div>
                <div>{this.state.time.date}</div>
                <div>{this.state.time.hours}</div>
                <div className="select-input">
                    <select id="select" onChange={this.handleSelect}>
                        <option value="belgrade">Beograd</option>
                        <option value="london">London</option>
                        <option value="paris">Pariz</option>
                        <option value="tokyo">Tokio</option>
                        <option value="madrid">Madrid</option>
                    </select>
                </div>
            </div>
        )    
    }
}
    export default Example;
if (document.getElementById('lokacija')) {
    ReactDOM.render(<Example />, document.getElementById('lokacija'));
}
