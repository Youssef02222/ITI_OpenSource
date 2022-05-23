import { NavLink } from "react-router-dom";

let ArtistItem = ({ artistInfo }) => {
    return (
        <div className="col-sm-3">
            <div className="card alert alert-primary text-center" style={{ width: '18rem' }}>
                <img src={"images/covers/" + artistInfo.cover + ".jpg"} alt={artistInfo.name} className="card-img-top" />
                <div className="card-body">
                    <h5 className="card-title">{artistInfo.name}</h5>
                    <NavLink to={`/artists/${artistInfo.id}`} className="btn btn-info">More</NavLink>
                </div>
            </div>
        </div>
    )
}

export default ArtistItem;