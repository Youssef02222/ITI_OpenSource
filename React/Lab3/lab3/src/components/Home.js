import { NavLink } from "react-router-dom";

let Home = () => {
    return (
        <div className="my-image-div">
            <center>
                <NavLink to={'/artists'} className="my-image-text">Music DB</NavLink>
            </center>
        </div>
    );
}

export default Home;