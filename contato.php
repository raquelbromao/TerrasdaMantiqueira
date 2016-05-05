<?php
$subjectPrefix = '[Contato TerrasdaMantiqueira.Com]';
$emailTo = 'raquelbromao@gmail.com';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = stripslashes(trim($_POST['form-name']));
    $email   = stripslashes(trim($_POST['form-email']));
    $phone   = stripslashes(trim($_POST['form-tel']));
    $message = stripslashes(trim($_POST['form-mensagem']));
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subjectPrefix)) {
        die("Header injection detected");
    }

    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);

    if($name && $email && $emailIsValid && $message){
        $body = "Nome: $name <br /> Email: $email <br /> Telefone: $phone <br /> Mensagem: $message";

        $headers .= sprintf( 'Return-Path: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'From: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'Reply-To: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'Message-ID: <%s@%s>%s', md5( uniqid( rand( ), true ) ), $_SERVER[ 'HTTP_HOST' ], PHP_EOL );
        $headers .= sprintf( 'X-Priority: %d%s', 3, PHP_EOL );
        $headers .= sprintf( 'X-Mailer: PHP/%s%s', phpversion( ), PHP_EOL );
        $headers .= sprintf( 'Disposition-Notification-To: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'MIME-Version: 1.0%s', PHP_EOL );
        $headers .= sprintf( 'Content-Transfer-Encoding: 8bit%s', PHP_EOL );
        $headers .= sprintf( 'Content-Type: text/html; charset="utf-8"%s', PHP_EOL );

        mail($emailTo, "=?utf-8?B?".base64_encode($subjectPrefix)."?=", $body, $headers);
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <title>Cadastre Seu Imovel - TerrasdaMantiqueira.Com - Quer Vender Seu Imovel? Cadastre Aqui! +55 (12) 3971-1150</title>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <!-- CSS do Index -->
    <link href="css/contato.css" type="text/css" rel="stylesheet">
    <link href="css/geral.css" type="text/css" rel="stylesheet">
    <!-- META -->
    <meta name ="url" content="http://www.terrasdamantiqueira.com/anuncieaqui.html">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="description" content="Terras da Mantiqueira especializada em Imoveis Rurais, com mais de 10 anos de experiencia e corretores especializados na venda de Chacaras, Sitios e Fazendas, para atende-lo! Ligue pra gente: (35) 3655.1112 | WHATSAPP: (12) 9.9129.5988">
    <meta name="keywords" content="fazendas a venda, sitios a venda, chacaras a venda, terrenos a venda, pousadas a venda, imoveis rurais a venda,  serra da mantiqueira, terras mantiqueira, mountain property for sale, propiedad de montana, propriété de montagne, quintinha para vender, casa di campagna in vendita, cottage in vendita, country cottage for sale, country homes for sale, herdades para vender, fermette à vendre, granjas para la venta, fattoria in vendita, tenuta rurale in vendita, proprieta rurale, farms for sale, ranches for sale, farmland for sale, land for sale, ferme à vendre, quinta para vender, podere in vendita, small farm for sale, rural property, ferme à vendre, mountain property, propiedad de montana, propriété de montagne, country homes, lote a venda, lotto in vendita, land for sale, rural property for sale, country homes for sale, terrain à vendre, mountain property for sale,  propiedad de montana, propriété de montagne, posada, albergo in vendita, inn for sale, auberge a vendre, ostello per la vendita, rural property for sale, country homes for sale, mountain property, propiedad de montana, propriete de montagne, mantiqueira imoveis, imoveis da mantiqueira, imobiliaria terras da mantiqueira, terras da mantiqueira, www.terrasdamantiqueira.com">
    <meta name="rating" content="general">
    <meta name="rating" content="imoveis rurais a venda">
    <meta name="rating" content="fazendas a venda">
    <meta name="rating" content="sitios a venda">
    <meta name="rating" content="chacaras a venda">
    <meta name="rating" content="pousadas a venda">
    <meta name="rating" content="terrenos a venda">
    <meta name="rating" content="serra da mantiqueira">
    <meta name="resource-type" content="document">
    <meta name="classification" content="internet">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="robots" content="all,index,follow">
    <meta name="googlebot" content="index, follow">
    <meta name="msnbot" content="index,follow">
    <meta name="distribution" content="global">
    <meta name="author" content="imobiliaria terrasdamantiqueira.com">
    <meta name="copyright" content="imobiliaria terrasdamantiqueira.com">
    <meta name="publisher" content="imobiliaria terrasdamantiqueira.com - www.terrasdamantiqueira.com">
    <meta http-equiv="reply-to" content="contato@terrasdamantiqueira.com">
    <meta name="expires" content="0">
    <meta name="audience" content="all">
    <meta name="doc-class" content="completed">
    <meta name="revisit-after" content="1">
    <meta name="p:domain_verify" content="37ead54e12a0f51b89cf9725b1c3da00"/>
</head> 

<body>    
    <div class="container">
        
        <header class="row">
                <div class="masthead">
                    <div class="img-header">
                        <a class="logo" href="#">TerrasdaMantiqueira.Com</a>
                    </div>   

                    <nav>
                        <ul class="nav nav-justified">    

                            <li class="imagem dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CASAS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">São Paulo</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Rio de Janeiro</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Minas Gerais</a></li>
                                </ul>
                            </li> 

                            <li class="imagem dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CHÁCARAS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">São Paulo</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Rio de Janeiro</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Minas Gerais</a></li>
                                </ul>
                            </li> 

                             <li class="imagem dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SÍTIOS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">São Paulo</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Rio de Janeiro</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Minas Gerais</a></li>
                                </ul>
                            </li> 

                            <li class="imagem dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FAZENDAS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">São Paulo</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Rio de Janeiro</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Minas Gerais</a></li>
                                </ul>
                            </li> 

                            <li class="imagem dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">POUSADAS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">São Paulo</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Rio de Janeiro</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Minas Gerais</a></li>
                                </ul>
                            </li>     

                            <li class="imagem dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TERRENOS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">São Paulo</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Rio de Janeiro</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Minas Gerais</a></li>
                                </ul>
                            </li> 

                            <li class="imagem"><a href="#">CONTATO</a></li>

                        </ul> 
</nav>   

                    <div class="img-rolante">
                    <marquee scrollamount=2
               behavior=alternate direction="right">
                        <img src="imagem/Contato/smantiqueira22.jpg" width="1236" height="182"/>     
                    </marquee>
                </div>
                </div>
            </header>   

        <div class="row">           

            <div role="main" class="col-md-12">
                <h1>Contato <span class="icones"><a href="#"><span class="glyphicon glyphicon-home"></span></a> <a href="#"><span class="glyphicon glyphicon-envelope"></span></a></span></h1> 
                
                <hr class="sep">
                
                <div class="row bloco1">
                    <div class="col-md-6">  
                        <h2>QUEM SOMOS</h2>
                        <p class="quote">"Somos fruto da paixão pela vida rural, do desejo de compartilhar este sentimento e contribuir para o surgimento de novos amantes da permanente aventura que é a vida no campo."</p>
                        <p style="color:#697052"><span class="strong">TERRAS DA MANTIQUEIRA</span> atua no mercado de compra e venda de imóveis rurais desde 2003 e nasceu com a vocação de inovar e oferecer uma forma moderna de divulgar a venda de propriedades rurais na região da Serra da Mantiqueira. Temos profundo conhecimento de mercado e buscamos identificar os desejos de nossos clientes para encontrar a opção mais adequada às suas necessidades, expectativas e conveniências.</p>
                    </div> 
                    
                    <div class="col-md-6"> 
                        <h2>FALE CONOSCO</h2>
                        <p style="color:#697052">Diga como é a propriedade que deseja encontrar, quanto pretende investir, qual a metragem ideal e as outras características do imóvel dos seus sonhos.</p>
                        
                        <hr class="sep">
                        
                        <?php if(!empty($emailSent)): ?>
                            <div class="col-md-6 col-md-offset-3">
                                <div class="alert alert-success text-center">Sua mensagem foi enviada com sucesso.</div>
                            </div>
                        <?php else: ?>
                            <?php if(!empty($hasError)): ?>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="alert alert-danger text-center">Houve um erro no envio, tente novamente mais tarde.</div>
                                </div>
                            <?php endif; ?>
                        
                        <form class="contato" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="contact-form" class="form-horizontal" role="form" method="post" style="margin-top:3px">
                            <div class="form-group">
                                <label for="name" class="col-lg-2 control-label">Nome</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="form-name" name="form-name" placeholder="Nome" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control" id="form-email" name="form-email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tel" class="col-lg-2 control-label">Telefone</label>
                                <div class="col-lg-10">
                                    <input type="tel" class="form-control" id="form-tel" name="form-tel" placeholder="Telefone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mensagem" class="col-lg-2 control-label">Mensagem</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" id="form-mensagem" name="form-mensagem" placeholder="Mensagem" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-default">Enviar</button>
                                </div>
                            </div>
                        </form>                    
                    </div> 
                     <?php endif; ?>

                </div>
                
                <hr class="sep">
                
                <div class="row bloco1" style="margin-top: 3px; margin-bottom:0">
                    <div class="col-md-6">
                        <h2>AGENDE SUA VISITA</h2>
                        <p style="color:#697052">Para melhor atender nossos clientes, trabalhamos com visitas pré-agendadas para programação junto aos proprietários.</p>
                        <h2>HORÁRIO DE ATENDIMENTO</h2>
                        <p style="color:#697052">Segunda a Sábado, das 09:00 às 18:00</p>
                        <h2 style="text-decoration:underline">COMO CHEGAR</h2>
                    </div>

                    <div class="col-md-6">
                        <h2>ENTRE EM CONTATO</h2>
                        <span class="strong">TELEFONES</span>
                        <p style="margin-bottom:0;color:#697052">+ 55 (12) 3971.1150  | + 55 (35) 3655.1112</p>  
                        <span class="strong">ENDEREÇO</span>
                        <p style="color:#697052">Av.Presidente Vargas, nº. 562, Sapucaí Mirim, MG</p>
                    </div>
                </div>
                
                <div class="row bloco1" style="margin-bottom:0">
                    <div class="col-md-12" style="margin-bottom:0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14718.05390418445!2d-45.742279!3d-22.746318!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x936af6b0d517fb3c!2sTerras+da+Mantiqueira!5e0!3m2!1spt-BR!2sbr!4v1458315915061" width="100%" height="280" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                
            </div>
            
        </div>
        
        <footer class="row">
                        
            <div class="img-footer"></div>
            
            <p style="font-size: 8px; margin-top: 5px; margin-bottom:2px"> <img style="margin-left: 10px; margin-right: 10px" src="imagem/Index/informacao.gif" /> <!--<span class="glyphicon glyphicon-earphone" style="margin-left: 10px; margin-right: 10px"></span> +55 12 3971.1150 --> <span class="linkt1">TERMOS DE USO</span> Web Design &amp; Development by <a class="linkt1" href="mailto:contato@terrasdamantiqueira.com">TerrasdaMantiqueira.Com</a> © 2003 | All 
      rights reserved | <span class="linkt1">CRECI SP 94809 
      - CRECI MG 18190</span></p>
            
            <p style="font-size: 11px; margin-bottom:3px"> Encontre seu Imóvel na <a class="linkt2" href="terrasdamantiqueira.com">TERRAS DA MANTIQUEIRA</a></p>
            
            <p style="font-size:8px; margin-bottom:1px">
                <a href="#" class="linkt1">CASAS A VENDA</a> | 
                <a href="#" class="linkt1">CHÁCARAS A VENDA</a> |
                <a href="#" class="linkt1">SÍTIOS A VENDA</a> |
                <a href="#" class="linkt1">FAZENDAS A VENDA</a> |
                <a href="#" class="linkt1">POUSADAS A VENDA</a> |
                <a href="#" class="linkt1">TERRENOS A VENDA</a>
            </p>
            
            <p style="font-size:11px"><a href="#" class="link3">CLIQUE AQUI</a> e Cadastre seu Imóvel a Venda conosco</p>
            
        </footer>  
        
    </div>    
   
    <!-- jQuery (necessario para os plugins Javascript Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--[if gte IE 9]><!-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!--<![endif]-->
    <script type="text/javascript" src="assets/js/contact-form.js"></script>
    
</body>
</html>