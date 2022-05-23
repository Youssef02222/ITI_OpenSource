import { NavLink } from "react-router-dom";

let Album = ({ albumInfo }) => {
    return (
        <div className="col-sm-3">
            <div className="card alert alert-primary text-center" style={{ width: '18rem' }}>
                <img src={"../images/albums/" + albumInfo.cover + ".jpg"} alt={albumInfo.name} className="card-img-top" />
                <div className="card-body">
                    <h5 className="card-title">{albumInfo.title}</h5>
                    <h6>{albumInfo.year}</h6>
                    <a href="#" className="btn btn-primary">Buy | ${albumInfo.price}</a>
                </div>
            </div>
        </div>
    )
}

export default Album;