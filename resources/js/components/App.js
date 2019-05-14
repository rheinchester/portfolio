import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Todos from './Todos';
import Header from './Header';
import Footer from './Footer';




class App extends Component {
  state = {
      todos: [
        {
          id: 1,
          title: "Hello",
          completed: false
        },
        {
          id: 2,
          title: "How are you",
          completed: false
        },
        {
          id: 3,
          title: "Hello",
          completed: false
        }
      ]
    }
  render() {
    return (
      <div className="container">
      <Header/>
        <div className="row justify-content-center">
          <div className="col-md-8">
            <div className="card">
              <div className="card-header">Todo List</div>
              <Todos todos={this.state.todos} />
            </div>
          </div>
        </div>
      <Footer/>
      </div>
    );
  }
}

ReactDOM.render(<App />, document.getElementById('app'));
export default App