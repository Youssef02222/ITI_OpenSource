import { Component } from "react";

export default class SecondComponent extends Component{

    imgs = ["./1.png","./2.png","./3.png","./4.png","./5.png","./6.png","./7.png","./8.png","./9.jpg","./10.png"];
    i = 0;
    count = null;

    constructor(){
        super();
        this.state = {
            img:"./1.png",
        }
    }

    Next_element = ()=>{
        if(this.i<this.imgs.length-1){
            this.i++;
            this.setState({img:this.imgs[this.i]});
            clearInterval(this.count)
        }
    }

    Prev_element = ()=>{
        if(this.i>0){
            this.i--;
            this.setState({img:this.imgs[this.i]})
            clearInterval(this.count)
        }
    }

    slide = ()=>{
        this.count = setInterval(this.doSlide, 1000);
    }

    doSlide = ()=>{
        if(this.i<this.imgs.length-1){
            this.i++;
            this.setState({img:this.imgs[this.i]});
        }else{
            this.i = 0;
            this.setState({img:this.imgs[this.i]});
        }
    }

    stopSlider = ()=>{
        clearInterval(this.count)
    }

    render(){
        return(
            <div>
                <img src={this.state.img} alt="Slider"/><br></br>
                <input type="button" value="Previous" onClick={this.Prev_element}/>
                <input type="button" value="Next" onClick={this.Next_element}/>
                <input type="button"value="Slide" onClick={this.slide}  />
                <input  type="button" value="Stop"  onClick={this.stopSlider} />
            </div>
        )
    }
}