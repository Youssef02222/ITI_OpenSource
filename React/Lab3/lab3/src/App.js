import { BrowserRouter, Route, Routes } from "react-router-dom"
import ArtistDetails from "./components/ArtistDetails";
import Artists from "./components/Artists"
import Error from "./components/Error";
import Home from "./components/Home";

let App = ()=>{
  return (
      <BrowserRouter>
          <Routes>
              <Route path="" element={<Home />}/>
              <Route path="home" element={<Home />}/>
              <Route path="artists" element={<Artists />}/>
              <Route path="artists/:id" element={<ArtistDetails />}/>
            <Route path="error" element={<Error />} />
            <Route path="*" element={<Error />} />
          </Routes>
      </BrowserRouter>
  )
}

export default App;
