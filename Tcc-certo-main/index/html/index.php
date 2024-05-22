<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
  <link rel="stylesheet" href="../css/index.css">

  
  <title>Hello, world!</title>
</head>

<body>

  <!--Navbar-->
  <div class="c">
    <header class="header">
      <img class="logo" src="../imagens/Logo.jpeg" alt="Joystick Jungle">
      <nav class="navbar">
        <a href="#" class="a">Inicio</a>
        <a href="#" class="a">Sobre</a>
        <a href="#" class="a">Suporte</a>
        <a href="#" class="a">Iniciar sessão</a>
        <div class="pesquisar" id="divpesquisa" onclick="abrirpesquisa(event)">
          <input type="text" id="Buscar" placeholder="Buscar" class="Buscar"/>
          <!--<img class="ipesq" id="pesquisarmuitoshow" src="../../index/imagens/lupa.png" alt="pesquisar">-->
        </div>
      </nav>
    </header>
    
  </div>





<!--fim Navbar-->

<!--<script>
  function abrirpesquisa(event){
    var pesq = document.getElementById("divpesquisa");
    var imag = document.getElementById("pesquisarmuitoshow");
    var newpes = document.createElement("input");
    newpes.setAttribute("type", "search");
    newpes.setAttribute("placeholder", "Buscar")
    newpes.setAttribute("class", "buscar");
    newpes.className = "Buscar";
    imag.parentNode.removeChild(imag);
    pesq.appendChild(newpes);
    event.preventDefault();
  }
</script>-->
  
<div class="box">
  <div class="tamanhoS">
    <h2>Destaques da semana</h2>
    <div class="df">
      <div id="carouselExampleIndicators" class="carousel slide">
        <?php include '../fetch_images.php'; ?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>


  <div class="tamanhoS1">
    <div class="destaques">
      <div class="vermais">
        <h2 class="titulo">Lançamentos</h2>
        <button class="botao" type="submit">VER MAIS</button>
      </div>
    <div id="carouselExampleIndicators-2" class="carousel slide" data-interval="false">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators-2" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators-2" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators-2" data-slide-to="2"></li>
      </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">

            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>
                    
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              
          </div>
          <div class="carousel-item">
            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                  <div class="col-sm">
                      <div class="cardj">
                        <div class="imagej">
                          <h2>Div 1</h2>
                          <p>Conteúdo da Div 1</p>                      
                        </div>
                        <div class="gamen">
                          <h2 class="nomej">nome</h2>
                          <h3>preço</h3>
                        </div>
                      </div>
                  </div>
                    
                  <div class="col-sm">
                    <div class="cardj">
                      <div class="imagej">
                        <h2>Div 1</h2>
                        <p>Conteúdo da Div 1</p>                      
                      </div>
                      <div class="gamen">
                        <h2 class="nomej">nome</h2>
                        <h3>preço</h3>
                      </div>
                    </div>
                  </div>

                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                  <div class="col-sm">
                      <div class="cardj">
                        <div class="imagej">
                          <h2>Div 1</h2>
                          <p>Conteúdo da Div 1</p>                      
                        </div>
                        <div class="gamen">
                          <h2 class="nomej">nome</h2>
                          <h3>preço</h3>
                        </div>
                      </div>
                  </div>
                    
                  <div class="col-sm">
                    <div class="cardj">
                      <div class="imagej">
                        <h2>Div 1</h2>
                        <p>Conteúdo da Div 1</p>                      
                      </div>
                      <div class="gamen">
                        <h2 class="nomej">nome</h2>
                        <h3>preço</h3>
                      </div>
                    </div>
                  </div>

                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators-2" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators-2" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
  </div>
  


  <div class="tamanhoS2">
    <div class="destaques">
      <div class="vermais">
        <h2 class="titulo">Jogos populares</h2>
        <button class="botao" type="submit">VER MAIS</button>
      </div>
    <div id="carouselExampleIndicators-3" class="carousel slide" data-interval="false">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators-3" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators-3" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators-3" data-slide-to="2"></li>
      </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">

            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>
                    
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

              </div>
            </div>
              
          </div>
          <div class="carousel-item">
            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                  <div class="col-sm">
                      <div class="cardj">
                        <div class="imagej">
                          <h2>Div 1</h2>
                          <p>Conteúdo da Div 1</p>                      
                        </div>
                        <div class="gamen">
                          <h2 class="nomej">nome</h2>
                          <h3>preço</h3>
                        </div>
                      </div>
                  </div>
                    
                  <div class="col-sm">
                    <div class="cardj">
                      <div class="imagej">
                        <h2>Div 1</h2>
                        <p>Conteúdo da Div 1</p>                      
                      </div>
                      <div class="gamen">
                        <h2 class="nomej">nome</h2>
                        <h3>preço</h3>
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                  <div class="col-sm">
                      <div class="cardj">
                        <div class="imagej">
                          <h2>Div 1</h2>
                          <p>Conteúdo da Div 1</p>                      
                        </div>
                        <div class="gamen">
                          <h2 class="nomej">nome</h2>
                          <h3>preço</h3>
                        </div>
                      </div>
                  </div>
                    
                  <div class="col-sm">
                    <div class="cardj">
                      <div class="imagej">
                        <h2>Div 1</h2>
                        <p>Conteúdo da Div 1</p>                      
                      </div>
                      <div class="gamen">
                        <h2 class="nomej">nome</h2>
                        <h3>preço</h3>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators-3" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators-3" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
  </div>


  <div class="tamanhoS3">
    <div class="destaques">
      <div class="vermais">
        <h2 class="titulo">Procurar por categorias</h2>
        <button class="botao" type="submit">VER MAIS</button>
      </div>
    <div id="carouselExampleIndicators-4" class="carousel slide" data-interval="false">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators-4" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators-4" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators-4" data-slide-to="2"></li>
      </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">

            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>
                    
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

              </div>
            </div>
              
          </div>
          <div class="carousel-item">
            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                  <div class="col-sm">
                      <div class="cardj">
                        <div class="imagej">
                          <h2>Div 1</h2>
                          <p>Conteúdo da Div 1</p>                      
                        </div>
                        <div class="gamen">
                          <h2 class="nomej">nome</h2>
                          <h3>preço</h3>
                        </div>
                      </div>
                  </div>
                    
                  <div class="col-sm">
                    <div class="cardj">
                      <div class="imagej">
                        <h2>Div 1</h2>
                        <p>Conteúdo da Div 1</p>                      
                      </div>
                      <div class="gamen">
                        <h2 class="nomej">nome</h2>
                        <h3>preço</h3>
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                  <div class="col-sm">
                      <div class="cardj">
                        <div class="imagej">
                          <h2>Div 1</h2>
                          <p>Conteúdo da Div 1</p>                      
                        </div>
                        <div class="gamen">
                          <h2 class="nomej">nome</h2>
                          <h3>preço</h3>
                        </div>
                      </div>
                  </div>
                    
                  <div class="col-sm">
                    <div class="cardj">
                      <div class="imagej">
                        <h2>Div 1</h2>
                        <p>Conteúdo da Div 1</p>                      
                      </div>
                      <div class="gamen">
                        <h2 class="nomej">nome</h2>
                        <h3>preço</h3>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators-4" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators-4" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
    </div>
  </div>

<!--erro-->
  <div class="tamanhoS4">
    <div class="destaques">
      <div class="vermais">
        <h2 class="titulo">Promoçoes especiais</h2>
        <button class="botao" type="submit">VER MAIS</button>
      </div>
    <div id="carouselExampleIndicators-5" class="carousel slide" data-interval="false">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators-5" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators-5" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators-5" data-slide-to="2"></li>
      </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">

            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>
                    
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              
          </div>
          <div class="carousel-item">
            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                  <div class="col-sm">
                      <div class="cardj">
                        <div class="imagej">
                          <h2>Div 1</h2>
                          <p>Conteúdo da Div 1</p>                      
                        </div>
                        <div class="gamen">
                          <h2 class="nomej">nome</h2>
                          <h3>preço</h3>
                        </div>
                      </div>
                  </div>
                    
                  <div class="col-sm">
                    <div class="cardj">
                      <div class="imagej">
                        <h2>Div 1</h2>
                        <p>Conteúdo da Div 1</p>                      
                      </div>
                      <div class="gamen">
                        <h2 class="nomej">nome</h2>
                        <h3>preço</h3>
                      </div>
                    </div>
                  </div>

                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="conteudo">
              <div class="row">
                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>

                  <div class="col-sm">
                      <div class="cardj">
                        <div class="imagej">
                          <h2>Div 1</h2>
                          <p>Conteúdo da Div 1</p>                      
                        </div>
                        <div class="gamen">
                          <h2 class="nomej">nome</h2>
                          <h3>preço</h3>
                        </div>
                      </div>
                  </div>
                    
                  <div class="col-sm">
                    <div class="cardj">
                      <div class="imagej">
                        <h2>Div 1</h2>
                        <p>Conteúdo da Div 1</p>                      
                      </div>
                      <div class="gamen">
                        <h2 class="nomej">nome</h2>
                        <h3>preço</h3>
                      </div>
                    </div>
                  </div>

                <div class="col-sm">
                  <div class="cardj">
                    <div class="imagej">
                      <h2>Div 1</h2>
                      <p>Conteúdo da Div 1</p>                      
                    </div>
                    <div class="gamen">
                      <h2 class="nomej">nome</h2>
                      <h3>preço</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators-5" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators-5" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
  </div>

      <div class="box2">
        <div class="ver2 esq">
          <h3>Em breve</h3>
          <div class="jogos">
            <p>jogo 1</p>
          </div>

          <div class="jogos">
            <p>jogo 2</p>
          </div>

          <div class="jogos">
            <p>jogo 3</p>
          </div>

          <div class="jogos">
            <p>jogo 4</p>
          </div>

          <div class="jogos">
            <p>jogo 5</p>
          </div>

        </div>

        <div class="ver2">
          <h3>Mais vendidos</h3>
          <div class="jogos">
            <p>jogo 1</p>
          </div>

          <div class="jogos">
            <p>jogo 2</p>
          </div>

          <div class="jogos">
            <p>jogo 3</p>
          </div>

          <div class="jogos">
            <p>jogo 4</p>
          </div>

          <div class="jogos">
            <p>jogo 5</p>
          </div>

        </div>
        <div class="ver2">
          <h3>Mais jogados</h3>
          <div class="jogos">
            <p>jogo 1</p>
          </div>

          <div class="jogos">
            <p>jogo 2</p>
          </div>

          <div class="jogos">
            <p>jogo 3</p>
          </div>

          <div class="jogos">
            <p>jogo 4</p>
          </div>

          <div class="jogos">
            <p>jogo 5</p>
          </div>

        </div>


      </div>
  </div>
</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    
</body>

</html>