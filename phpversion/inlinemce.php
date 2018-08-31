<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Syllabus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--<script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_HTML"></script>-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- <script src='scripts/tinymce.min.js'></script> -->
    <script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
  </head>

  <body>

<!-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div>
  </div>
</nav> -->

<!-- <div style="position: fixed; right: 10px; top: 10px;" class="btn-group, hidden-print"> -->
<div class="btn-group, hidden-print">
<a onClick='ut();return false' title="Save to Database" href="#" id="save" class="btn btn-primary">Save</a>
<a onclick="buttonaction()" title="Clone this syllabus to make your own version" href="#" class="btn btn-default">Clone</a>

<a onclick="buttonaction()" title="Reset to default template" href="#" class="btn btn-warning">Reset</a>
<a onclick="editpage()" title="Clone this syllabus to make your own version" href="#" class="btn btn-default">Edit</a>
</div>
<div style="position: fixed; right: 10px; top: 10px;" class="hidden-print, idbanner">
<p>Syllabus ID: <span id="idfromdb">0027</span></p>
</div>

    <div class="container">
      <div class="editable">


      <?php
      $f="syllabus.txt";
      if(filesize($f)>0){
        $fh=fopen($f,'r');
        $d=fread($fh,filesize($f));
        fclose($fh);
        echo $d;
         echo "<script>console.log( 'txt file loaded' );</script>";
      }
    ?>
    </div>
    </div>

    <script>
    function buttonaction() {
        alert("Buttons don't do anything yet");
    }
// function doneedits(){
//
//   tinymce.remove();
// }

    function editpage() {
  //     tinymce.init({
  //   selector: '.editablemin, h1, #title',
  //   inline: true,
  //
  //   toolbar: 'undo redo',
  //   menubar: false
  // });
        tinymce.init({
          selector: 'div.editable',
          inline: true,
          browser_spellcheck: true,
          plugins: [
             'advlist autolink lists link image charmap print preview hr anchor pagebreak',
             'searchreplace wordcount visualblocks visualchars code fullscreen',
             'insertdatetime media nonbreaking save table contextmenu directionality',
             'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
           ],
           toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
           toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
           image_advtab: true,
           templates: [
             { title: 'Test template 1', content: 'Test 1' },
             { title: 'Test template 2', content: 'Test 2' }
           ]

          });
    }

    function ut(){
      tinymce.remove();
    	$.ajax({
    		type:"POST",
    		url:'save.php',
    		data:"text="+encodeURIComponent($(".editable").html())
    	});
        return false;
    };

    </script>
<!-- TODO look at template button for row -->
  </body>

</html>
