<html>

  <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="ckeditor/ckeditor.js"></script>

    <script>

      $(document).ready(function() {

        $('#fetch').click(function(e) {

          e.preventDefault;

          var url = $('#urlInput').val();

          var data = 'url='+url;

          $.ajax({
            type: "POST",
            url: "getHtml.php",
            data: data,
            success: function(response) {
              $('#template').html(response).css('visibility', 'initial');
            }
          });
        });

        $('#clear').click(function(e) {

          e.preventDefault;

          $('#template').html('');

        });

        $('#save').click(function(e) {

          e.preventDefault;

          var html = $('#template').html();

          console.log(html);

        });

      });

    </script>

  </head>

  <body>

    <div class="container-fluid">

      <div class="page-header">

        <h1 class="text-center">Email Template Editor</h1>

      </div>

      <div class="row">
        <div class="col-sm-12">

          <div class="form-group">
            <label for="urlInput">HTML Template URL</label>
            <input type="text" id="urlInput" class="form-control">
            <span class="help-block">Please enter a full URL including 'http://'</span>
          </div>

        </div>
      </div>

      <div class="row" style="margin-bottom:40px;">
        <div class="col-sm-4 col-sm-offset-4">

          <button type="submit" id="fetch" class="btn btn-primary">Fetch HTML</button>

          <button type="submit" id="clear" class="btn btn-default">Clear HTML</button>

          <button type="submit" id="save" class="btn btn-success">Save HTML</button>

        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">

          <div id="template" style="visibility:hidden;">

          </div>

        </div>
      </div>

    </div>

    <script>

      var template = document.getElementById( 'template' );

      template.setAttribute( 'contenteditable', true );

      CKEDITOR.inline( 'template', {
        // Allow some non-standard markup that we used in the introduction.
        extraAllowedContent: 'a(documentation);code',
        removePlugins: 'stylescombo',
        // Show toolbar on startup (optional).
        startupFocus: false
      } );

    </script>

  </body>

</html>
