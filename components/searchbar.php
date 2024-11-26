<?php
    function searchbar(){
        return "
            <div class='searchbar'>
                <form action='postHandlers/searchPosting.php' method='post'>
                    <input id='searchInput' type='search' name='search' placeholder='O que procura?'>
                    <select id='regionInput' list='regions' name='region'>
                        <option value='Todo Portugal'>Todo Portugal</option>
                        <option value='Aveiro'>Aveiro</option>
                        <option value='Beja'>Beja</option>
                        <option value='Braga'>Braga</option>
                        <option value='Bragança'>Bragança</option>
                        <option value='Castelo Branco'>Castelo Branco</option>
                        <option value='Coimbra'>Coimbra</option>
                        <option value='Évora'>Évora</option>
                        <option value='Faro'>Faro</option>
                        <option value='Guarda'>Guarda</option>
                        <option value='Leiria'>Leiria</option>
                        <option value='Lisboa'>Lisboa</option>
                        <option value='Portalegre'>Portalegre</option>
                        <option value='Porto'>Porto</option>
                        <option value='Santarém'>Santarém</option>
                        <option value='Setúbal'>Setúbal</option>
                        <option value='Viana do Castelo'>Viana do Castelo</option>
                        <option value='Vila Real'>Vila Real</option>
                        <option value='Viseu'>Viseu</option>
                    </select>
                    <button id='searchButton' type='submit' name='submit'>Pesquisar</button>
                </form>
            </div>
        ";
    }
?>