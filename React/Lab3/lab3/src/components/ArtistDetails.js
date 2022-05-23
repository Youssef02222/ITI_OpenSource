import { useEffect, useState } from "react";
import { NavLink, useParams } from "react-router-dom";
import Album from "./Album";

let ArtistDetails = () => {
    let { id } = useParams();
    let [artist, setArtist] = useState({});
    let [errorMessage, setErrorMessage] = useState("");

    useEffect(() => {
        fetch(`http://localhost:3000/artists/${id}`)
            .then((response) => { return response.json() })
            .then((data) => {
                setArtist(data);
                setErrorMessage("");
            })
            .catch((error) => { setErrorMessage(error); })
    }, []);

    let renderAlbums = ()=>{
        return artist.albums.map((album) => {
            return (
                <Album  key={album.albumId} albumInfo={album} />
            )
        })
    }


    let renderArtist = () => {
        if (artist.name) {
            return (
                <div className="alert alert-primary">
                    <div className="card my-3 text-center" >
                        <center><img src={"../images/covers/" + artist.cover + ".jpg"} style={{ width: '18rem' }} alt={artist.name} className="card-img-top" /></center>
                        <h5 className="card-header">{artist.name}</h5>
                        <div className="card-body">
                            <div>
                                <span style={{ fontSize: '1.2rem', fontWeight: 'bold' }}>BIO: </span>
                                {artist.bio}
                            </div>
                            <div>
                                <span style={{ fontSize: '1.2rem', fontWeight: 'bold' }}>Genre: </span>
                                {artist.genre}
                            </div>
                            <div>
                                <span style={{ fontSize: '1.2rem', fontWeight: 'bold' }}>Albums </span>
                                <div className="row">
                                    {renderAlbums()}                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )
        } else {
            return (<h1 className="alert alert-danger text-center">No Artist</h1>)
        }
    }
    return (
        <div>
            <center><NavLink className="nav-div" to={'/artists'}>Music DB</NavLink></center>
            {renderArtist()}
        </div>
    );
}

export default ArtistDetails;