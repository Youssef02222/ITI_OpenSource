import { Component } from "react";
export default class FirstComponent extends Component{

    constructor(){
        super();
        this.state = {
            changedText:"",
        }
    }

    changedText = ()=>{
        this.setState({changedText:""})
    }

    render(){
        return(
                <div>
                    <br></br>
                    <input  type="text"  className="form-control" value={this.state.changedText} onChange={(e)=>{this.setState({changedText:e.target.value})  }}  />
                    <h2>{this.state.changedText}</h2>
                  <input type="button"   value="Clear"  onClick={this.changedText}/>
                  <br></br>
                  <br></br>         
                </div>       
        )
    }
}