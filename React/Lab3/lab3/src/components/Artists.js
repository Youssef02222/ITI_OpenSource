import { Component } from "react";
import { NavLink } from "react-router-dom";
import ArtistItem from "./ArtistItem";

export default class Artists extends Component {
    constructor() {
        super();
        this.state = {
            allArtists: [],
            errorMessage: ""
        };
    }

    renderAllArtists = () => {
        if (this.state.allArtists.length > 0) {
            return this.state.allArtists.map((artist) => {
                return (
                    <ArtistItem key={artist.id} artistInfo={artist} />
                )
            })
        } else if (this.state.errorMessage) {
            return (<h1 className="alert alert-danger">Check Your Internet Connection</h1>)
        } else {
            return (<h1>Getting Data...</h1>)
        }
    }

    render() {
        return (
            <div className="row">            
                <center><NavLink className="nav-div" to={'/'}>Home</NavLink></center>
                {this.renderAllArtists()}
            </div>
        )
    }

    componentDidMount() {
        fetch("http://localhost:3000/artists")
            .then((response) => { return response.json() })
            .then((data) => {
                this.setState({ allArtists: data })
                this.setState({ errorMessage: "" })
            })
            .catch((error) => { this.setState({ errorMessage: error }) })
    }
}