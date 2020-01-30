import React, { Component } from "react";
import ReactDOM from 'react-dom';

class Example extends Component {
  constructor() {
    super();
    this.state = {
      date: new Date()
    };
    console.log("constructor: Poziva se konstruktor.");
  }  
  
  componentDidMount() {
    this.timer = setInterval(() => this.otkucaj(), 1000);
    console.log(
      "componentDidMount: Zavrseno iscrtavanje. Pocinje otkucavanje."
    );
  }  
  
  componentWillUnmount() {
    clearInterval(this.timer);
    console.log(
      "componentWillUnmount: Zaustavlja se otkucavanje. Brisanje komponente."
    );
  }  
  
  otkucaj() {
    this.setState({
      date: new Date()
    });
  }  
  
  //prebaciti render na pocetak
  render() {
    console.log("render: Komponenta se iscrtava.");
    return (
      <div id="doctors">
        <h2>{this.state.date.toLocaleTimeString()}</h2>
      </div>
    );
  }
}

export default Example;
if (document.getElementById('lokacija')) {
    ReactDOM.render(<Example />, document.getElementById('lokacija'));
}