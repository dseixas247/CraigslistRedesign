<?php include_once 'header.php'; ?>

<?php
    require_once 'dbFunctions/posting/get.php';
    require_once 'dbFunctions/image/getMainByPosting.php';
    require_once 'dbFunctions/image/get.php';
    require_once 'dbFunctions/dbConnect.php';

    if(isset($_GET["id"])){
        $posting = getPosting($db, $_GET["id"]);
        if($posting){ 
            $mainImage = getMainImageByPosting($db, $_GET["id"]);
            $images = getImage($db, $_GET["id"]);?>

            <main class="formContainer">
                <h2>Editar Anúncio "<?=$posting['title']?>"</h2>
                <form class="form" action="postHandlers/updatePosting.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="postingId" value="<?=$posting['id']?>">
                    <input type="hidden" name="user" value="<?=$_SESSION["email"]?>">

                    <?php
                        foreach($images as $image){
                            echo("<input type='hidden' name='image". $image['position'] ."Id' value='". $image['id'] ."'>");
                        } 
                    ?>


                    <label id="formLabel" for="title">Title</label> 
                    <input id="title" type="text" name="title" value="<?=$posting['title']?>">
                
                    <label id="formLabel" for="price">Preço</label> 
                    <input id="price" type="number" name="price" value="<?=$posting['price']?>">
                        
                    <label id="formLabel" for="description">Descrição</label> 
                    <textarea id="description" name="description"><?=$posting['description']?></textarea>

                    <label id="formLabel" for="region">Região</label> 
                    <select id='region' name='region'>
                        <option value='' disabled hidden>Selecione uma opção</option>
                        <option value='Aveiro' <?=$posting['region'] == 'Aveiro' ? "selected" : ""?>>Aveiro</option>
                        <option value='Beja' <?=$posting['region'] == 'Beja' ? "selected" : ""?>>Beja</option>
                        <option value='Braga' <?=$posting['region'] == 'Braga' ? "selected" : ""?>>Braga</option>
                        <option value='Bragança' <?=$posting['region'] == 'Bragança' ? "selected" : ""?>>Bragança</option>
                        <option value='Castelo Branco' <?=$posting['region'] == 'Castelo Branco' ? "selected" : ""?>>Castelo Branco</option>
                        <option value='Coimbra' <?=$posting['region'] == 'Coimbra' ? "selected" : ""?>>Coimbra</option>
                        <option value='Évora' <?=$posting['region'] == 'Évora' ? "selected" : ""?>>Évora</option>
                        <option value='Faro' <?=$posting['region'] == 'Faro' ? "selected" : ""?>>Faro</option>
                        <option value='Guarda' <?=$posting['region'] == 'Guarda' ? "selected" : ""?>>Guarda</option>
                        <option value='Leiria' <?=$posting['region'] == 'Leiria' ? "selected" : ""?>>Leiria</option>
                        <option value='Lisboa' <?=$posting['region'] == 'Lisboa' ? "selected" : ""?>>Lisboa</option>
                        <option value='Portalegre' <?=$posting['region'] == 'Portalegre' ? "selected" : ""?>>Portalegre</option>
                        <option value='Porto' <?=$posting['region'] == 'Porto' ? "selected" : ""?>>Porto</option>
                        <option value='Santarém' <?=$posting['region'] == 'Santarém' ? "selected" : ""?>>Santarém</option>
                        <option value='Setúbal' <?=$posting['region'] == 'Setúbal' ? "selected" : ""?>>Setúbal</option>
                        <option value='Viana do Castelo' <?=$posting['region'] == 'Viana do Castelo' ? "selected" : ""?>>Viana do Castelo</option>
                        <option value='Vila Real' <?=$posting['region'] == 'Vila Real' ? "selected" : ""?>>Vila Real</option>
                        <option value='Viseu' <?=$posting['region'] == 'Viseu' ? "selected" : ""?>>Viseu</option>
                    </select>
                        
                    <label id="formLabel" for="category">Categoria</label> 
                    <select id='category' name='category' onchange='changeOptions(value);'>
                        <option value='' disabled hidden>Selecione uma opção</option>
                        <option value='Comunidade' <?=$posting['category'] == 'Comunidade' ? "selected" : ""?>>Comunidade</option>
                        <option value='Imóveis' <?=$posting['category'] == 'Imóveis' ? "selected" : ""?>>Imóveis</option>
                        <option value='Empregos' <?=$posting['category'] == 'Empregos' ? "selected" : ""?>>Empregos</option>
                        <option value='Vendas' <?=$posting['category'] == 'Vendas' ? "selected" : ""?>>Vendas</option>
                        <option value='Serviços' <?=$posting['category'] == 'Serviços' ? "selected" : ""?>>Serviços</option>
                    </select>
                
                    <label id="formLabel" for="subcategory">Sub-Categoria</label> 
                    <select id='subcategory' name='subcategory'>
                        <option value='' disabled hidden>Selecione uma opção</option>
                        <?php
                            $comunidade = ["Acolhimento de Crianças", "Animais", "Artistas", "Atividades", "Aulas", "Compartilha de Carro", "Conexões Perdidas", "Eventos", "Músicos", "Perdidos", "Voluntários"];
                            $imoveis = ["Aluguéis de Férias", "Apartamentos e Moradias", "Escritórios e Comerciais", "Estacionamentos", "Moradias Procuradas", "Quartos Procurados", "Quartos", "Troca de Casa", "Venda de Imóveis"];
                            $empregos = ["Administração", "Alimentação e Hospedagem", "Arquitetura", "Beleza", "Ciência", "Contabilidade", "Educação", "Fabricação", "Governo", "Gravação e Edição", "Imobiliária", "Legal e Paralegal", "Marketing", "Informática", "Recursos Humanos", "Saúde", "Segurança", "Software", "Suporte Técnico", "Transporte", "Tv, Filme e Video", "Negócio"];
                            $vendas = ["Antiguidade", "Artesanato", "Aviação", "Barco", "Bicicleta", "Bilhete", "Carro", "Camião", "Coleção", "Computador", "Desejado", "Eletrodoméstico", "Eletrônico", "Equipamento Pesado", "Desporto", "Ferramenta", "Foto e Vídeo", "Infantil", "Instrumento Musical", "Jardinagem", "Jogo e Brinquedo", "Jóia", "Livro", "Material", "Mobília", "Mota", "Negócio", "Peça de Barco", "Peça de Bicicleta", "Peça de Carro", "Peça de Mota", "Peça de Computador", "Roupa", "Sáude e Beleza", "Troca", "Video Jogo"];
                            $servicos = ["Animais Estimação", "Aula", "Beleza", "Computador", "Criativo", "Evento", "Jardim", "Financeiros", "Imóveis", "Jurídica", "Lar", "Marítimos", "Pequenos Negócios", "Mudança", "Viagem e Férias"];

                            foreach($comunidade as $sub) {
                                if($posting['category'] == 'Comunidade'){
                                    if($posting['subcategory'] == $sub){
                                        echo "<option class='comunidadeOptions' value='". $sub ."' selected>". $sub ."</option>";
                                    }else{
                                        echo "<option class='comunidadeOptions' value='". $sub ."'>". $sub ."</option>";
                                    }
                                }else{
                                    echo "<option class='comunidadeOptions' value='". $sub ."' disabled hidden>". $sub ."</option>";
                                }
                            }

                            foreach($imoveis as $sub) {
                                if($posting['category'] == 'Imóveis'){
                                    if($posting['subcategory'] == $sub){
                                        echo "<option class='imoveisOptions' value='". $sub ."' selected>". $sub ."</option>";
                                    }else{
                                        echo "<option class='imoveisOptions' value='". $sub ."'>". $sub ."</option>";
                                    }
                                }else{
                                    echo "<option class='imoveisOptions' value='". $sub ."' disabled hidden>". $sub ."</option>";
                                }
                            }

                            foreach($empregos as $sub) {
                                if($posting['category'] == 'Empregos'){
                                    if($posting['subcategory'] == $sub){
                                        echo "<option class='empregosOptions' value='". $sub ."' selected>". $sub ."</option>";
                                    }else{
                                        echo "<option class='empregosOptions' value='". $sub ."'>". $sub ."</option>";
                                    }
                                }else{
                                    echo "<option class='empregosOptions' value='". $sub ."' disabled hidden>". $sub ."</option>";
                                }
                            }

                            foreach($vendas as $sub) {
                                if($posting['category'] == 'Vendas'){
                                    if($posting['subcategory'] == $sub){
                                        echo "<option class='vendasOptions' value='". $sub ."' selected>". $sub ."</option>";
                                    }else{
                                        echo "<option class='vendasOptions' value='". $sub ."'>". $sub ."</option>";
                                    }
                                }else{
                                    echo "<option class='vendasOptions' value='". $sub ."' disabled hidden>". $sub ."</option>";
                                }
                            }

                            foreach($servicos as $sub) {
                                if($posting['category'] == 'Serviços'){
                                    if($posting['subcategory'] == $sub){
                                        echo "<option class='servicosOptions' value='". $sub ."' selected>". $sub ."</option>";
                                    }else{
                                        echo "<option class='servicosOptions' value='". $sub ."'>". $sub ."</option>";
                                    }
                                }else{
                                    echo "<option class='servicosOptions' value='". $sub ."' disabled hidden>". $sub ."</option>";
                                }
                            }
                        ?>                    
                    </select>

                    <label id="formLabel" for="image1">Imagem de Destaque</label> 
                    <?php
                    if($mainImage){
                        echo("<div class='imageInput'>
                        <img id='inputImage' src='serverImages/".$mainImage['id']."' alt=''>
                            <input id='image1' type='file' name='image1'>
                        </div>");
                    }else{
                        echo("<input id='image1' type='file' name='image1'>");
                    }
                    ?>
                    
                    <?php
                        $count = 1;
                        if($images){
                            foreach($images as $image){
                                if($image['position'] != 1){
                                    $count++;
                    ?>
                                    <label id="formLabel" for="image<?=$image['position']?>">Imagem <?=$image['position']?></label> 
                                    <div class="imageInput">
                                        <img id='inputImage' src='serverImages/<?=$image['id']?>' alt=''>
                                        <input id="image<?=$image['position']?>" type="file" name="image<?=$image['position']?>">
                                    </div>
                    <?php }}} ?>

                    <?php if($count<2){ ?>

                        <label id="formLabel" for="image2">Imagem 2</label> 
                        <input id="image2" type="file" name="image2">

                    <?php } ?>

                    <?php if($count<3){ ?>

                        <label id="formLabel" for="image3">Imagem 3</label> 
                        <input id="image3" type="file" name="image3">

                    <?php } ?>

                    <?php if($count<4){ ?>

                        <label id="formLabel" for="image4">Imagem 4</label> 
                        <input id="image4" type="file" name="image4">

                    <?php } ?>

                    <?php if($count<5){ ?>

                        <label id="formLabel" for="image5">Imagem 5</label> 
                        <input id="image5" type="file" name="image5">

                    <?php } ?>

                    <label id="formLabel" for="email">Email</label> 
                    <input id="email" type="email" name="email" value="<?=$posting['email']?>">

                    <label id="formLabel" for="phone">Telemóvel</label> 
                    <input id="phone" type="phone" name="phone" value="<?=$posting['phone']?>">
                    
                    <button id="button" type="submit" name="submit">Atualizar</button>
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
                    }
                ?>
            </main>

        <?php
        }else{
            echo "<p>Não foi encontrado o produto</p>";
        }
    }else{
        echo "<p>Não foi encontrado o produto</p>";
    }
?>

<?php include_once 'footer.php'; ?>