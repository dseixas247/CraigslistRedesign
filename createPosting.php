<?php include_once 'header.php'; ?>

<main class="formContainer">
    <h2>Novo Anúncio</h2>
    <form class="form" action="postHandlers/createPosting.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user" value="<?=$_SESSION["email"]?>">

        <label id="formLabel" for="title">Título</label> 
        <input id="title" type="text" name="title">
    
        <label id="formLabel" for="price">Preço</label> 
        <input id="price" type="number" name="price">
            
        <label id="formLabel" for="description">Descrição</label> 
        <textarea id="description" name="description"></textarea>

        <label id="formLabel" for="region">Região</label> 
        <select id='region' name='region'>
            <option value='' selected disabled hidden>Selecione uma opção</option>
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
            
        <label id="formLabel" for="category">Categoria</label> 
        <select id='category' name='category' onchange='changeOptions(value);'>
            <option value='' selected disabled hidden>Selecione uma opção</option>
            <option value='Comunidade'>Comunidade</option>
            <option value='Imóveis'>Imóveis</option>
            <option value='Empregos'>Empregos</option>
            <option value='Vendas'>Vendas</option>
            <option value='Serviços'>Serviços</option>
        </select>
    
        <label id="formLabel" for="subcategory">Sub-Categoria</label> 
        <select id='subcategory' name='subcategory' disabled>
            <option value='' selected disabled hidden>Selecione uma opção</option>
            <?php
                $comunidade = ["Acolhimento de Crianças", "Animais", "Artistas", "Atividades", "Aulas", "Compartilha de Carro", "Conexões Perdidas", "Eventos", "Músicos", "Perdidos", "Voluntários"];
                $imoveis = ["Aluguéis de Férias", "Apartamentos e Moradias", "Escritórios e Comerciais", "Estacionamentos", "Moradias Procuradas", "Quartos Procurados", "Quartos", "Troca de Casa", "Venda de Imóveis"];
                $empregos = ["Administração", "Alimentação e Hospedagem", "Arquitetura", "Beleza", "Ciência", "Contabilidade", "Educação", "Fabricação", "Governo", "Gravação e Edição", "Imobiliária", "Legal e Paralegal", "Marketing", "Informática", "Recursos Humanos", "Saúde", "Segurança", "Software", "Suporte Técnico", "Transporte", "Tv, Filme e Video", "Negócio"];
                $vendas = ["Antiguidade", "Artesanato", "Aviação", "Barco", "Bicicleta", "Bilhete", "Carro", "Camião", "Coleção", "Computador", "Desejado", "Eletrodoméstico", "Eletrônico", "Equipamento Pesado", "Desporto", "Ferramenta", "Foto e Vídeo", "Infantil", "Instrumento Musical", "Jardinagem", "Jogo e Brinquedo", "Jóia", "Livro", "Material", "Mobília", "Mota", "Negócio", "Peça de Barco", "Peça de Bicicleta", "Peça de Carro", "Peça de Mota", "Peça de Computador", "Roupa", "Sáude e Beleza", "Troca", "Video Jogo"];
                $servicos = ["Animais Estimação", "Aula", "Beleza", "Computador", "Criativo", "Evento", "Jardim", "Financeiros", "Imóveis", "Jurídica", "Lar", "Marítimos", "Pequenos Negócios", "Mudança", "Viagem e Férias"];

                foreach($comunidade as $sub) {
                    echo "<option class='comunidadeOptions' value='". $sub ."'>". $sub ."</option>";
                }

                foreach($imoveis as $sub) {
                    echo "<option class='imoveisOptions' value='". $sub ."'>". $sub ."</option>";
                }

                foreach($empregos as $sub) {
                    echo "<option class='empregosOptions' value='". $sub ."'>". $sub ."</option>";
                }

                foreach($vendas as $sub) {
                    echo "<option class='vendasOptions' value='". $sub ."'>". $sub ."</option>";
                }

                foreach($servicos as $sub) {
                    echo "<option class='servicosOptions' value='". $sub ."'>". $sub ."</option>";
                }
            ?>                    
        </select>

        <label id="formLabel" for="image1">Imagem de Destaque</label> 
        <input id="image1" type="file" name="image1">

        <label id="formLabel" for="image2">Imagem 2</label> 
        <input id="image2" type="file" name="image2">

        <label id="formLabel" for="image3">Imagem 3</label> 
        <input id="image3" type="file" name="image3">

        <label id="formLabel" for="image4">Imagem 4</label> 
        <input id="image4" type="file" name="image4">

        <label id="formLabel" for="image5">Imagem 5</label> 
        <input id="image5" type="file" name="image5">

        <label id="formLabel" for="email">Email</label> 
        <input id="email" type="email" name="email" value="<?=$_SESSION["email"]?>">

        <label id="formLabel" for="phone">Telemóvel</label> 
        <input id="phone" type="phone" name="phone">
        
        <button id="button" type="submit" name="submit">Publicar</button>
    </form>

    <?php
        require_once 'components/alert.php';

        if(isset($_GET["error"])){
            if($_GET["error"]=="emptyInput"){
                echo errorAlert("Por favor preencha os campos necessários");
            }
            if($_GET["error"]=="fileTypeUnsupported"){
                echo errorAlert("Formato da imagem ".$_GET["image"]." não suportado (formatos válidos: .jpg .jpeg .png .pdf)");
            }
            if($_GET["error"]=="uploadError"){
                echo errorAlert("Aconteceu um erro no upload da imagem ".$_GET["image"]);
            }
            if($_GET["error"]=="fileTooBig"){
                echo errorAlert("Imagem ".$_GET["image"]." é demasiada grande (Tem de ter 5MB ou menos)");
            }
            if($_GET["error"]=="none"){
                echo successAlert("Anúncio criado com successo");
            }
        }
    ?>
</main>

<?php include_once 'footer.php'; ?>