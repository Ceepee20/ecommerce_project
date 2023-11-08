<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Paage</title>
   <link href='bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <style type="text/css">
    #container{ 
                
             min-height:100px;              
      }

      


    </style>
</head>
<body>
    <div class="container-flexbox">
      
        <div class="row">
                 
                    
                    
                 <?php   
                 include_once "partial/header.php";
    
                  ?>  
                 

             
             <div class="row" style="height: 80px;flex-wrap:wrap; position: relative;top:100px;height:200px">
                  <div class='col-md' class="dropdown">
                       <!-- Example split danger button -->
                      <div class="btn-group">
                        <button type="button" class="btn btn-danger">Action</button>
                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                          <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="brand_category.php">All Brand Watches</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                      </div>
                  </div>
    
            </div>
            
            <div class="row">
                    <div class='col-md'>
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active" data-bs-interval="10000">
                            <img src="image/audemars.webp" class="d-block w-100" style="height:25rem" alt="...">
                          </div>
                          <div class="carousel-item" data-bs-interval="2000">
                            <img src="image/audemars.webp" class="d-block w-100 "  style="height:25rem" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="image/audemars.webp" class="d-block w-100"  style="height:25rem" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                
            </div>
             
            
                
    
                 </div>
         <div class="row" style="height: 90px;">
                 <div class='col-md'>
                     <a style="text-decoration: none;color:black;background-color: darkgray; position:relative;
                        left:20px;" href="#">Audemars Davislaurex x</a> 
                     <h5 style="position: relative;top:41px;position:relative;
                        left:20px;">2023 Watches Collections</h5>   
                 </div>
     
        </div>  
        <div class='col-md'>
                  <div class="row">
                    <div class="col-md-3">
                       <div class="card">
                          <img src="image/deena-unsplash.jpg" class="card-img-top img-fluid" alt="...">
                          <div class="card-body">
                            <p class="card-text">Deana-Unsplash.</p>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                          <div class="card">
                                <img src="image/darryl-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Darryl-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                            <div class="card">
                                <img src="image/lazar-guglet-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Lazar-Guglet-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                            <div class="card">
                                <img src="image/isabel-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Isabel-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                             <div class="card">
                                <img src="image/darryl-low-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Darrl-Low-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                            <div class="card">
                                <img src="image/kamran-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Kamran-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                             <div class="card">
                                <img src="image/haziq-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Haziq-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                              <div class="card">
                                <img src="image/tran-phuc-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Tran-Phuc-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                            <div class="card">
                                <img src="image/kelvin-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Kelvin-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                            <div class="card">
                                <img src="image/paul-vina-unsplash (2).jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Paul-Vina-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                            <div class="card">
                                <img src="image/usama-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Usama-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                           <div class="card">
                                <img src="image/paul-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Paul-Unplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                                <img src="image/olga-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Olga-Unsplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                            <div class="card">
                                <img src="image/stefan-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Stefan-Unsplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                             <div class="card">
                                <img src="image/mariah-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Mariah-Unsplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                          <div class="card">
                                <img src="image/nevergg-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Nevergg-Unsplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                           <div class="card">
                                <img src="image/francois-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Francois-Unsplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                          <div class="card">
                                <img src="image/rajat-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Austin-Lowman-Unsplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                           <div class="card">
                                <img src="image/rajat-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Rajat-Unsplash.</p>
                                </div>
                              </div>
                    </div>
                    <div class="col-md-3">
                           <div class="card">
                                <img src="image/rajat-unsplash.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <p class="card-text">Rajat-Unsplash.</p>
                                </div>
                              </div>
                    </div>
                    
                   
                    
                  </div>    
                       
             </div>
 
            
             
        <div class="row" style="min: height 100px;">
                        <div class='col-md-float'>
                                <nav aria-label="Page navigation example" >
                                        <ul class="pagination justify-content-center">
                                          <li class="page-item disabled">
                                            <a class="page-link">Previous</a>
                                          </li>
                                          <li class="page-item"><a class="page-link" href="brand_category.php">1</a></li>
                                          <li class="page-item"><a class="page-link" href="index.php">2</a></li>
                                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                                          <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                          </li>
                                        </ul>
                                 </nav>
                        </div>
                             
                    
                        <div class="text-end">
                <a href="#top" class="text-secondary"><i class="fa-solid fa-arrow-turn-up fa-flip-horizontal"></i>Back to top</a>
            </div>            
                         
                        
          </div> 
                    

        <?php
           
           include_once "partial/footer.php";
        
        ?>
               
    </div> 
                  
</div>
    
        <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>