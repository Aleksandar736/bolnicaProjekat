import React, { Component } from 'react';
import ReactDOM from 'react-dom'; 

class Example extends Component{
    constructor(){
        super();
        this.state={
            date: new Date(),
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
        this.timer = setInterval(() => this.otkucaj(), 1000);
    }

    componentWillUnmount() {
        clearInterval(this.timer);
    }

    otkucaj() {
        this.setState({
          date: new Date()
        });
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
                <div id="doctors">
                    <h2>{this.state.date.toLocaleTimeString()}</h2>
                </div>
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