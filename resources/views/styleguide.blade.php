<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Styleguide</title>


    <!-- bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://use.fontawesome.com/3ddd43fed9.js"></script>

  </head>
  <body id="styleguide">

    <div class="navigation">
      <nav class="navbar navbar-default">
         <div class="container-fluid">

           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <i class="fa fa-television" aria-hidden="true"></i>
             <a class="navbar-brand" href="" id="home">TV Show Tracker</a>
           </div>

           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav navbar-right">
               <li><a href="">All Shows</a></li>
             </ul>
           </div><!-- /.navbar-collapse -->
         </div><!-- /.container-fluid -->
       </nav>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h1>Styles</h1>
          <div class="colors row">
            <div class="col-lg-6 col-md-6">
              <h2>Colors</h2>
            </div>

            <div class="col-lg-3 col-md-3 col-xs-6 sizing">
            <div class="color-box" id="box1"></div>
            <p class="color-text">#BCA68B </p>
            </div>

            <div class="col-lg-3 col-md-3 col-xs-6 sizing">
            <div class="color-box" id="box2"></div>
            <p class="color-text"> #7E7E85 </p>
            </div>

            <div class="col-lg-6 col-md-6"></div>

            <div class="col-lg-3 col-md-3 col-xs-6 sizing">
            <div class="color-box" id="box3"></div>
            <p class="color-text">  #7E6E81</p>
            </div>


            <div class="col-lg-3 col-md-3 col-xs-6 sizing">
            <div class="color-box" id="box4"></div>
            <p class="color-text">#3F4664</p>
            </div>





          </div> <!--colors -->

          <div class="row">
          <div class="col-lg-12 col-md-12">
          <h2>Typography</h2>
          </div>

          <div class="col-lg-6 col-md-6">
          <h3>Fonts</h3>
          </div>

          <div class="col-lg-3 col-md-3">
            <h3>Header</h3>
          </div>

          <div class="col-lg-3 col-md-3">
            <h3>Body</h3>
          </div>

          <div class="col-lg-6 col-md-6"></div>

          <div class="col-lg-3 col-md-3 sizing">

          <p class="raleway light">Raleway Light</p>
          <p class="raleway regular">Raleway Regular</p>
          <p class="raleway bold">Raleway Bold</p>
          </div>

          <div class="col-lg-3 col-md-3 sizing">
          <p class="hind light">Hind Light</p>
          <p class="hind regular">Hind Regular</p>
          <p class="hind bold">Hind Bold</p>
          </div>


          <div class="col-lg-6 col-md-6">
          <h3>Headings</h3>
          </div>


          <div class="col-lg-6 col-md-6"></div>
          <div class="headings col-lg-6 col-md-6">
          <h1 class="heading1"> Heading 1</h1>
          <h2 class="heading2"> Heading 2</h2>
          <h3 class="heading3"> Heading 3</h3>
          <h4 class="heading4"> Heading 4</h4>
          <h5 class="heading5">Heading 5</h5>
          </div>


          <div class="col-lg-6 col-md-6">
          <h3>Paragraphs</h3>
          </div>

          <div class="col-lg-6 col-md-6"></div>
          <div class="col-lg-6 col-md-6">
          <p class="regular">
          <span class="bold">Paragraph text.</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tristique odio. Suspendisse eget turpis risus. Suspendisse aliquet sollicitudin erat, at vulputate mi malesuada eu.
          </p>

          <p class="bold">
          <span class="bold">p.lead-text.</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tristique odio. Suspendisse eget turpis risus. Suspendisse aliquet sollicitudin erat, at vulputate mi malesuada eu.
          </p>

          <p class="light">
          <span class="bold">p.light-text.</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tristique odio. Suspendisse eget turpis risus. Suspendisse aliquet sollicitudin erat, at vulputate mi malesuada eu.
          </p>


          </div>
          </div> <!--typography row -->

          <div class="row">
          <div class="col-lg-12 col-md-12">
          <h2>UI Elements</h2>
          </div>

          <div class="col-lg-6 col-md-6">
          <h3>Buttons</h3>
          </div>


          <div class="col-lg-6 col-md-6 sizing">
          <button class="btn btn-primary btn-sm">Small Button</button>
          </div>

          <div class="col-lg-6 col-md-6"></div>
          <div class="col-lg-6 col-md-6 sizing">
          <button class="btn btn-primary btn-md">Medium Buttom</button>
          </div>

          <div class="col-lg-6 col-md-6"></div>
          <div class="col-lg-6 col-md-6 sizing">
          <button class="btn btn-primary btn-lg">Large Button</button>
          </div>

          <div class="col-lg-6 col-md-6">
          <h3>Inputs</h3>
          </div>

          <div class="col-lg-6 col-md-6"></div>
          <div class="form-group input col-lg-6 col-md-6">
          <label for="text-input" id="text-input" name="text-input"><h4>Text Input</h4></label>
          <input class="form-control" type="text" value="" placeholder="Text Input" />
          </div>

          <div class="col-lg-6 col-md-6"></div>
          <div class="form-group col-lg-6 col-md-6">
          <label><h4>Select Input</h4></label>
          <select value="" class="form-control">
          <option value="Select here" selected>
          Select here
          </option>
          </select>
          </div>

          <div class="col-lg-6 col-md-6"></div>
          <div class="form-group col-lg-6 col-md-6">
          <label><h4>Textarea Input</h4></label>
          <textarea class="form-control" placeholder="Textarea Input"></textarea>
          </div>


          <div class="col-lg-6 col-md-6">
          <h3>Lists</h3>
          </div>

          <div class="col-lg-3 col-md-3 sizing">
          <h4> ul | Unordered List</h4>
          <ul>
          <li>List item</li>
          <li>List item </li>
          <li> List item </li>
          </ul>
          </div>

          <div class="col-lg-3 col-md-3 sizing">
          <h4> ol | Ordered List</h4>
          <ol>
          <li>List item </li>
          <li> List item</li>
          <li>List item </li>
          </ol>
          </div>


          </div>  <!--ui row -->

          <div class="row">
          <div class="col-lg-6 col-md-6">
          <h2>Icons</h2>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 sizing">
          <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 sizing">
          <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
          </div>


          <div class="col-lg-6 col-md-6"></div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 sizing">
          <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 sizing">
          <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
          </div>

        </div> -<!--icons row-->

        </div> <!--overall col-->
        </div> <!--row-->
      </div> <!--container-->

      <div class="ShowFooter">
        <a href="http://almawashington.com" target="_blank">Portfolio</a> |
           <a href="https://github.com/alma19" target="_blank">Github</a> |
           <a href="/">Credits</a> |
           <a href="/styleguide">Styleguide</a> |
           <a href="https://alma19.gitbooks.io/show-tracker-api/content/" target="_blank">Documentation</a>
      </div>

      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>
