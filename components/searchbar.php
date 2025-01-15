<?php
    function searchbar(){
        return "
            <div class='searchbar'>
                <form action='postHandlers/searchPosting.php' method='post'>
                    <div class='inputContainer'>
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
                    </div>
                    <button id='searchButton' type='submit' name='submit'>Pesquisar</button>
                </form>
            </div>
        ";
    }

    function searchbarWithFilters($search, $region, $category, $subcategory, $priceMin, $priceMax){
        if($search == ""){
            $component = "
                <div class='searchbar'>
                    <form action='postHandlers/searchPosting.php' method='post'>
                        <div class='inputContainer'>
                            <input id='searchInput' type='search' name='search' placeholder='O que procura?'>";
                            
        }else{
            $component = "
                <div class='searchbar'>
                    <form action='postHandlers/searchPosting.php' method='post'>
                        <div class='inputContainer'>
                            <input id='searchInput' type='search' name='search' value='".$search."'>";
        }
        
        $Aveiro = $region == "Aveiro" ? "selected" : "";
        $Beja = $region == "Beja" ? "selected" : "";
        $Braga = $region == "Braga" ? "selected" : "";
        $Braganca = $region == "Bragança" ? "selected" : "";
        $Castelo = $region == "Castelo Branco" ? "selected" : "";
        $Coimbra = $region == "Coimbra" ? "selected" : "";
        $Evora = $region == "Évora" ? "selected" : "";
        $Faro = $region == "Faro" ? "selected" : "";
        $Guarda = $region == "Guarda" ? "selected" : "";
        $Leiria = $region == "Leiria" ? "selected" : "";
        $Lisboa = $region == "Lisboa" ? "selected" : "";
        $Portalegre = $region == "Portalegre" ? "selected" : "";
        $Porto = $region == "Porto" ? "selected" : "";
        $Santarem = $region == "Santarém" ? "selected" : "";
        $Setubal = $region == "Setúbal" ? "selected" : "";
        $Viana = $region == "Viana do Castelo" ? "selected" : "";
        $Vila = $region == "Vila Real" ? "selected" : "";
        $Viseu = $region == "Viseu" ? "selected" : "";

        $Comunidade = $category == "Comunidade" ? "selected" : "";
        $Imoveis = $category == "Imóveis" ? "selected" : "";
        $Empregos = $category == "Empregos" ? "selected" : "";
        $Vendas = $category == "Vendas" ? "selected" : "";
        $Servicos = $category == "Serviços" ? "selected" : "";

        $component .= "<select id='regionInput' list='regions' name='region'>
                            <option value='Todo Portugal'>Todo Portugal</option>
                            <option value='Aveiro' ".$Aveiro.">Aveiro</option>
                            <option value='Beja' ".$Beja.">Beja</option>
                            <option value='Braga' ".$Braga.">Braga</option>
                            <option value='Bragança' ".$Braganca.">Bragança</option>
                            <option value='Castelo Branco' ".$Castelo.">Castelo Branco</option>
                            <option value='Coimbra' ".$Coimbra.">Coimbra</option>
                            <option value='Évora' ".$Evora.">Évora</option>
                            <option value='Faro' ".$Faro.">Faro</option>
                            <option value='Guarda' ".$Guarda.">Guarda</option>
                            <option value='Leiria' ".$Leiria.">Leiria</option>
                            <option value='Lisboa' ".$Lisboa.">Lisboa</option>
                            <option value='Portalegre' ".$Portalegre.">Portalegre</option>
                            <option value='Porto' ".$Porto.">Porto</option>
                            <option value='Santarém' ".$Santarem.">Santarém</option>
                            <option value='Setúbal' ".$Setubal.">Setúbal</option>
                            <option value='Viana do Castelo' ".$Viana.">Viana do Castelo</option>
                            <option value='Vila Real' ".$Vila.">Vila Real</option>
                            <option value='Viseu' ".$Viseu.">Viseu</option>
                        </select>
                    </div>
                    <div class='filterContainer'>
                        <label id='formLabel' for='filterCategory'>Categoria</label>
                        <select id='filterCategory' name='category' onchange='changeOptions(value);'>
                            <option value=''>Selecione uma opção</option>
                            <option value='Comunidade' ".$Comunidade.">Comunidade</option>
                            <option value='Imóveis' ".$Imoveis.">Imóveis</option>
                            <option value='Empregos' ".$Empregos.">Empregos</option>
                            <option value='Vendas' ".$Vendas.">Vendas</option>
                            <option value='Serviços' ".$Servicos.">Serviços</option>
                        </select>";

        $component .=   "<label id='formLabel' for='filterSubcategory'>Sub-Categoria</label> 
                        <select id='filterSubcategory' name='subcategory'>
                            <option value=''>Selecione uma opção</option>";

        $comunidade = ["Acolhimento de Crianças", "Animais", "Artistas", "Atividades", "Aulas", "Compartilha de Carro", "Conexões Perdidas", "Eventos", "Músicos", "Perdidos", "Voluntários"];
        $imoveis = ["Aluguéis de Férias", "Apartamentos e Moradias", "Escritórios e Comerciais", "Estacionamentos", "Moradias Procuradas", "Quartos Procurados", "Quartos", "Troca de Casa", "Venda de Imóveis"];
        $empregos = ["Administração", "Alimentação e Hospedagem", "Arquitetura", "Beleza", "Ciência", "Contabilidade", "Educação", "Fabricação", "Governo", "Gravação e Edição", "Imobiliária", "Legal e Paralegal", "Marketing", "Informática", "Recursos Humanos", "Saúde", "Segurança", "Software", "Suporte Técnico", "Transporte", "Tv, Filme e Video", "Negócio"];
        $vendas = ["Antiguidade", "Artesanato", "Aviação", "Barco", "Bicicleta", "Bilhete", "Carro", "Camião", "Coleção", "Computador", "Desejado", "Eletrodoméstico", "Eletrônico", "Equipamento Pesado", "Desporto", "Ferramenta", "Foto e Vídeo", "Infantil", "Instrumento Musical", "Jardinagem", "Jogo e Brinquedo", "Jóia", "Livro", "Material", "Mobília", "Mota", "Negócio", "Peça de Barco", "Peça de Bicicleta", "Peça de Carro", "Peça de Mota", "Peça de Computador", "Roupa", "Sáude e Beleza", "Troca", "Video Jogo"];
        $servicos = ["Animais Estimação", "Aula", "Beleza", "Computador", "Criativo", "Evento", "Jardim", "Financeiros", "Imóveis", "Jurídica", "Lar", "Marítimos", "Pequenos Negócios", "Mudança", "Viagem e Férias"];

        foreach($comunidade as $sub) {
            if($category == 'Comunidade'){
                if($subcategory == $sub){
                    $component .= "<option class='comunidadeOptions' value='". $sub ."' selected>". $sub ."</option>";
                }else{
                    $component .= "<option class='comunidadeOptions' value='". $sub ."'>". $sub ."</option>";
                }
            }else{
                $component .= "<option class='comunidadeOptions' value='". $sub ."' disabled hidden>". $sub ."</option>";
            }
        }

        foreach($imoveis as $sub) {
            if($category == 'Imóveis'){
                if($subcategory == $sub){
                    $component .= "<option class='imoveisOptions' value='". $sub ."' selected>". $sub ."</option>";
                }else{
                    $component .= "<option class='imoveisOptions' value='". $sub ."'>". $sub ."</option>";
                }
            }else{
                $component .= "<option class='imoveisOptions' value='". $sub ."' disabled hidden>". $sub ."</option>";
            }
        }

        foreach($empregos as $sub) {
            if($category == 'Empregos'){
                if($subcategory == $sub){
                    $component .= "<option class='empregosOptions' value='". $sub ."' selected>". $sub ."</option>";
                }else{
                    $component .= "<option class='empregosOptions' value='". $sub ."'>". $sub ."</option>";
                }
            }else{
                $component .= "<option class='empregosOptions' value='". $sub ."' disabled hidden>". $sub ."</option>";
            }
        }

        foreach($vendas as $sub) {
            if($category == 'Vendas'){
                if($subcategory == $sub){
                    $component .= "<option class='vendasOptions' value='". $sub ."' selected>". $sub ."</option>";
                }else{
                    $component .= "<option class='vendasOptions' value='". $sub ."'>". $sub ."</option>";
                }
            }else{
                $component .= "<option class='vendasOptions' value='". $sub ."' disabled hidden>". $sub ."</option>";
            }
        }

        foreach($servicos as $sub) {
            if($category == 'Serviços'){
                if($subcategory == $sub){
                    $component .= "<option class='servicosOptions' value='". $sub ."' selected>". $sub ."</option>";
                }else{
                    $component .= "<option class='servicosOptions' value='". $sub ."'>". $sub ."</option>";
                }
            }else{
                $component .= "<option class='servicosOptions' value='". $sub ."' disabled hidden>". $sub ."</option>";
            }
        }        

        $component .= "</select>
                            <label id='formLabel' for='filterPrice'>Preço</label>";

        if($priceMin == ""){
            $component .= "<input id='filterPriceMin' type='number' name='priceMin' placeholder='Min'>";
        }else{
            $component .= "<input id='filterPriceMin' type='number' name='priceMin' value='".$priceMin."'>";
        }

        $component .= "<p id='priceBetween'>-<p>";

        if($priceMin == ""){
            $component .= "<input id='filterPriceMax' type='number' name='priceMax' placeholder='Max'>";
        }else{
            $component .= "<input id='filterPriceMax' type='number' name='priceMax' value='".$priceMax."'>";
        }
        
        $component .=  "<p id='priceEnd'>€<p> 
                        </div>
                        <button id='searchButton' type='submit' name='submit'>Pesquisar</button>
                    </form>
                </div>
            ";
        
        return $component;
    }
?>